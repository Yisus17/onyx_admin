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

	public function storeOrUpdate(CreateEditProductRequest $request, $id=null){
		$editMode = $id != null;

		if($editMode){
			$product = Product::findOrFail($id);
			$product->update($request->except(['countable', 'image']));
		}else{
			$product = new Product($request->except(['countable', 'image']));
		}

		$product->countable = (bool) request('countable');

		if($request->file('image')){
			$file = $request->file('image');
			$file->store('products', ['disk' => 'public_uploads']);
			$product->image_name = $file->hashName();
			$product->image_original_name = $file->getClientOriginalName();
		}else if(!$request->product_image_name){
			$product->image_name = null;
			$product->image_original_name = null;
		}

		$category = Category::find($request->category_id);
		$product->category()->associate($category);

		$message = 'Producto '. ($editMode ? 'editado' : 'creado') .' exitosamente';
		$product->save();
		return redirect('products')->with('message', $message);
	}

	public function store(CreateEditProductRequest $request){
		return $this->storeOrUpdate($request);
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
		return $this->storeOrUpdate($request, $id);
	}

	public function destroy($id){
		$productToDelete=Product::findOrFail($id);
		$productToDelete->delete();
		return back()->with('message', 'Producto eliminado exitosamente');
	}

	public function exportExcel(Request $request){
		return $request;
	}
}
