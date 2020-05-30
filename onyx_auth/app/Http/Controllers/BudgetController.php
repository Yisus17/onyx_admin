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

	public function store(CreateEditBudgetRequest $request){

		//try{
			$budget = new Budget($request->all());
		
			$client = Client::find($request->client_id);
			$budget->client()->associate($client);

			$taxBase = 0; //Base imponible

			if($budget->save()){
				//PRODUCTS
				$products = $request->products;
				foreach ($products as $product){
					$totalProductPrice = calculateProductTotalPrice($product);
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

					$taxBase = $taxBase + $totalProductPrice; // Add total product price to tax base (budget)
				}
				
				$budget->total = $taxBase; // Add total to budget
				$budget->save();
				return redirect('budgets')->with('message', 'Presupuesto creado exitosamente');
			}else{
				App::abort(500, 'Error');
			}
		/*} catch(\Throwable $exception){
			return back()->withErrors(['message', $exception->getMessage()]);
		}*/
	}

	public function show($id){
		$budget = Budget::findOrFail($id);

		//dd($budget->products[0]->pivot);
		return view('budgets.show', compact('budget'));
	}

	public function edit(Budget $budget){
	}

	public function update(Request $request, Budget $budget){
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
		return (new BudgetsExport($budgetToExport))->download('presupuesto.xlsx', Excel::XLSX);
	}

	public function excelView($id){
		$budget = Budget::findOrFail($id);
		return view('budgets.excel', compact('budget'));
	}
}
