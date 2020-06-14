<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Invoice;
use App\Client;
use App\Product;
use App\Http\Requests\CreateEditInvoiceRequest;
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Excel;
use Carbon\Carbon;

class InvoiceController extends Controller{
	
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$invoices =  Invoice::paginate(20);
		return view('invoices.list', compact('invoices'));
	}

	public function create(){
		$clients = Client::all();
		$products = Product::select('id','code','description')->get();
		return view(
			'invoices.create', 
			compact('clients', 'products'));
	}

	public function storeOrUpdate(CreateEditInvoiceRequest $request, $id=null){
		$editMode = $id != null;

		if($editMode){
			$invoice = Invoice::findOrFail($id);
			$invoice->update($request->all());
		}else{
			$invoice = new Invoice($request->all());
		}

		$client = Client::find($request->client_id);
		$invoice->client()->associate($client);
		$invoice->push();

		$taxBase = 0; //Base imponible
		$products = $request->products;

		if(isset($request->products)){
			if($editMode) {
				$invoice->products()->detach();
			}
			
			foreach ($products as $product){
				$totalProductPrice = calculateProductTotalPrice($product);
				$taxBase = $taxBase + $totalProductPrice;

				$invoice->products()->attach(
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
		
		$message = 'Factura '. ($editMode ? 'editada' : 'creada') .' exitosamente';
		$invoice->total = $taxBase; // Add total to invoice
		return redirect('invoices')->with('message', $message);
	}

	public function store(CreateEditInvoiceRequest $request){
		return $this->storeOrUpdate($request);
	}

	public function show($id){
		$invoice = Invoice::findOrFail($id);
		return view('invoices.show', compact('invoice'));
	}

	public function edit($id){
		$invoice =  Invoice::findOrFail($id);
		$clients = Client::all();
		$products = Product::select('id','code','description')->get();
		return view('invoices.edit', compact('invoice', 'clients', 'products'));
	}

	public function update(CreateEditInvoiceRequest $request, $id){
		return $this->storeOrUpdate($request, $id);
	}

	public function destroy($id){
		$invoiceToDelete = Invoice::findOrFail($id);
		$invoiceToDelete->delete();
		return redirect('invoices')->with('message', 'Factura eliminada exitosamente');
	}

	public function addProduct(Request $request){
		try{
			$productId = (int)$request->product_id;
			$product =  Product::findOrFail($productId);
			$uniqid = Str::random(9); //Unique id to manipulate events in DOM per product
		} catch(Exception $exception){
			return $exception;
		}
		
		return view('invoices.product', compact('product', 'uniqid'));
	}

	public function excelExport($id){
		$invoiceToExport = Invoice::findOrFail($id);
		$fileName = 'factura'.$invoiceToExport->id.'_'.Carbon::now()->timestamp.'.xlsx';
		return (new InvoicesExport($invoiceToExport))->download($fileName, Excel::XLSX);
	}

	public function excelView($id){
		$invoice = Invoice::findOrFail($id);
		return view('invoices.excel', compact('invoice'));
	}

	public function duplicate($id){
		$invoiceToDuplicate = Invoice::findOrFail($id);
		$newInvoice = $invoiceToDuplicate->replicate();
		$newInvoice->push();

		foreach ($invoiceToDuplicate->products as $invoiceProduct){
			$newInvoice->products()->attach(
				$invoiceProduct->id, 
				[
					'description' => $invoiceProduct->pivot->description,
					'quantity' => $invoiceProduct->pivot->quantity,
					'factor' => $invoiceProduct->pivot->factor,
					'unit_price' => $invoiceProduct->pivot->unit_price,
					'discount' => $invoiceProduct->pivot->discount,
					'total_price' => $invoiceProduct->pivot->total_price
				]
			);
		}
		return redirect()->route('invoices.show', [$newInvoice->id])->with('message', 'Factura duplicada exitosamente');
	}
}
