<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Maatwebsite\Excel\Facade\Excel;
use App\Http\Requests\CreateEditProductRequest;

class ProductController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $products =  Product::paginate(20);
        return view('products.list', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(CreateEditProductRequest $request){
        $product = new Product($request->except(['countable']));
        $product->countable = (bool) request('countable');
        $category = Category::find($request->category_id);
        $product->category()->associate($category);

        $product->save();
        return redirect('products')->with('message', 'Product created successfully');
    }

    public function show($id){
        $product =  Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id){
        $product =  Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(CreateEditProductRequest $request, $id){
        $productToUpdate =  Product::findOrFail($id);
        $productToUpdate->update($request->except(['countable']));
        $productToUpdate->countable = (bool) request('countable');

        $category = Category::find($request->category_id);
        $productToUpdate->category()->associate($category);

        $productToUpdate->save();
        return redirect('products')->with('message', 'Product updated successfully');
    }

    public function destroy($id){
        $productToDelete=Product::findOrFail($id);
        $productToDelete->delete();
        return back()->with('message', 'Product deleted successfully');
    }

    public function exportExcel(Request $request){
        return $request;
    }
}
