<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Client;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEditBudgetRequest;
use App\Exports\BudgetsExport;
use Maatwebsite\Excel\Excel;
use Carbon\Carbon;

class BudgetController extends Controller{

	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$budgets =  Budget::paginate(20);
		return view('budgets.list', compact('budgets'));
	}

	public function create(){
		$clients = Client::all();
		$products = Product::select('id','code','description')->get();
		return view(
			'budgets.create', 
			compact('clients', 'products'));
	}

	public function storeOrUpdate(CreateEditBudgetRequest $request, $id=null){
		$editMode = $id != null;

		if($editMode){
			$budget = Budget::findOrFail($id);
			$budget->update($request->all());
		}else{
			$budget = new Budget($request->all());
		}

		$client = Client::find($request->client_id);
		$budget->client()->associate($client);
		$budget->push();

		$taxBase = 0; //Base imponible
		$products = $request->products;

		if(isset($request->products)){
			if($editMode) {
				$budget->products()->detach();
			}
			
			foreach ($products as $product){
				$totalProductPrice = calculateProductTotalPrice($product);
				$taxBase = $taxBase + $totalProductPrice;

				$budget->products()->attach(
					$product['id'], 
					[
						'description' => $product['description'],
						'quantity' => $product['quantity'],
						'factor' => $product['factor'],
						'unit_price' => $product['unit_price'],
						'discount' => $product['discount'],
						'total_price' => $totalProductPrice
					]
				);
			}
		}
		
		$message = 'Presupuesto '. ($editMode ? 'editado' : 'creado') .' exitosamente';
		$budget->total = $taxBase; // Add total to budget
		return redirect('budgets')->with('message', $message);
	}

	public function store(CreateEditBudgetRequest $request){
		return $this->storeOrUpdate($request);
	}

	public function show($id){
		$budget = Budget::findOrFail($id);
		return view('budgets.show', compact('budget'));
	}

	public function edit($id){
		$budget =  Budget::findOrFail($id);
		$clients = Client::all();
		$products = Product::select('id','code','description')->get();
		return view('budgets.edit', compact('budget', 'clients', 'products'));
	}

	public function update(CreateEditBudgetRequest $request, $id){
		return $this->storeOrUpdate($request, $id);
	}

	public function destroy($id){
		$budgetToDelete = Budget::findOrFail($id);
		$budgetToDelete->delete();
		return redirect('budgets')->with('message', 'Presupuesto eliminado exitosamente');
	}

	public function addProduct(Request $request){
		try{
			$productId = (int)$request->product_id;
			$product =  Product::findOrFail($productId);
			$uniqid = Str::random(9); //Unique id to manipulate events in DOM per product
		} catch(Exception $exception){
			return $exception;
		}
		
		return view('budgets.product', compact('product', 'uniqid'));
	}

	public function excelExport($id){
		$budgetToExport = Budget::findOrFail($id);
		$fileName = 'presupuesto'.$budgetToExport->id.'_'.Carbon::now()->timestamp.'.xlsx';
		return (new BudgetsExport($budgetToExport))->download($fileName, Excel::XLSX);
	}

	public function excelView($id){
		$budget = Budget::findOrFail($id);
		return view('budgets.excel', compact('budget'));
	}

	public function duplicate($id){
		$budgetToDuplicate = Budget::findOrFail($id);
		$newBudget = $budgetToDuplicate->replicate();
		$newBudget->push();

		foreach ($budgetToDuplicate->products as $budgetProduct){
			$newBudget->products()->attach(
				$budgetProduct->id, 
				[
					'description' => $budgetProduct->pivot->description,
					'quantity' => $budgetProduct->pivot->quantity,
					'factor' => $budgetProduct->pivot->factor,
					'unit_price' => $budgetProduct->pivot->unit_price,
					'discount' => $budgetProduct->pivot->discount,
					'total_price' => $budgetProduct->pivot->total_price
				]
			);
		}
		return redirect()->route('budgets.show', [$newBudget->id])->with('message', 'Presupuesto duplicado exitosamente');
	}
}
