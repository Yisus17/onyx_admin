<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Maatwebsite\Excel\Facade\Excel;

class ProductController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $products =  Product::paginate(20);
        return view('products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'bought_at'=>'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->bought_at = $request->bought_at;

        $product->save();
        return back()->with('message', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $product =  Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product =  Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $productToUpdate =  Product::findOrFail($id);
        
        $productToUpdate->name = $request->name;
        $productToUpdate->description = $request->description;
        $productToUpdate->price = $request->price;
        $productToUpdate->bought_at = $request->bought_at;

        $productToUpdate->save();

        return back()->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $productToDelete=Product::findOrFail($id);
        $productToDelete->delete();
        return back()->with('message', 'Product deleted successfully');
    }

    public function exportExcel(Request $request){
        return $request;
    }
}
