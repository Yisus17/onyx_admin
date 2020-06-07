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
		if($id == null){
			$budget = new Budget($request->all());
		}else{
			$budget = Budget::findOrFail($id);
			$budget->update($request->all());
		}

		$client = Client::find($request->client_id);
		$budget->client()->associate($client);

		$taxBase = 0; //Base imponible
	
		if($budget->save()){
			$products = $request->products;
			$productsToSync = array();

			if(isset($request->products)){
				foreach ($products as $product){
					$totalProductPrice = calculateProductTotalPrice($product);
					$taxBase = $taxBase + $totalProductPrice;

					if($id == null){
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
					}else{
						//Update using the incremental id of the many to many relationship
						$productsToSync[$product['pivot_id']] = array(
							'product_id'=> $product['id'],
							'description' => $product['description'],
							'quantity' => $product['quantity'],
							'factor' => $product['factor'],
							'unit_price' => $product['unit_price'],
							'discount' => $product['discount'],
							'total_price' => $totalProductPrice
						);
					}
				}
			}
			
			$message = 'Presupuesto creado exitosamente';

			if($id != null){
				//Sync/update products
				$budget->products()->sync($productsToSync);
				$message = 'Presupuesto editado exitosamente';
			}
			
			$budget->total = $taxBase; // Add total to budget
			$budget->save();
			return redirect('budgets')->with('message', $message);
		}else{
			App::abort(500, 'Error');
		}
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
		$newBudget = $budgetToDuplicate->duplicate();
		$newBudget->save();

		return redirect()->route('budgets.show', [$newBudget->id])->with('message', 'Presupuesto duplicado exitosamente');
	}
}
