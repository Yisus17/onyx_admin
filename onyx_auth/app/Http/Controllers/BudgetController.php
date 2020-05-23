<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Client;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEditBudgetRequest;

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
		$paymentConditions = Budget::getPaymentConditions();
		$paymentMethods = Budget::getPaymentMethods();
		$validityOptions = Product::getValidityOptions();
		return view(
			'budgets.create', 
			compact('clients', 'products', 'validityOptions', 'paymentConditions', 'paymentMethods'));
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

	public function show(Budget $budget){
	}

	public function edit(Budget $budget){
	}

	public function update(Request $request, Budget $budget){
	}

	public function destroy(Budget $budget){
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
}
