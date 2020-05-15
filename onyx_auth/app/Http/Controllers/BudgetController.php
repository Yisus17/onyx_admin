<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Client;
use App\Product;
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
		$products = Product::all();
		return view('budgets.create', compact('clients', 'products'));
	}

	public function store(Request $request){
	}

	public function show(Budget $budget){
	}

	public function edit(Budget $budget){
	}

	public function update(Request $request, Budget $budget){
	}

	public function destroy(Budget $budget){
	}
}
