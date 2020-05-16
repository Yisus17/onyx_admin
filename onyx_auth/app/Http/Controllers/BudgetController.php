<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Client;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
		$validityOptions = Product::getValidityOptions();
		return view('budgets.create', compact('clients', 'products', 'validityOptions'));
	}

	public function store(Request $request){
		dd($request);
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
