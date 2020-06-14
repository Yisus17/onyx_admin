<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProduct extends Migration{
    
	public function up(){
		Schema::create('invoice_product', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('invoice_id');
			$table->unsignedBigInteger('product_id');
			$table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

			$table->text('description');
			$table->integer('quantity');
			$table->float('factor');
			$table->float('unit_price');
			$table->float('discount')->nullable();
			$table->float('total_price');
		});
	}


	public function down(){
		Schema::dropIfExists('invoice_product');
	}
}
