<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration{
    public function up(){
			Schema::create('invoices', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->unsignedBigInteger('client_id');
				$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
				$table->string('validity');
				$table->text('description')->nullable();
				$table->string('address');
				$table->string('payment_conditions');
				$table->string('payment_method');
				$table->text('notes')->nullable();
				$table->dateTime('delivery_date');
				$table->dateTime('return_date');
				$table->dateTime('instalation_date');
				$table->dateTime('start_date');
				$table->dateTime('end_date');
				$table->dateTime('uninstalation_date');
				$table->float('tax_percentage');
				$table->float('total')->nullable();
				$table->timestamps();
			});
    }


	public function down(){
		Schema::dropIfExists('invoices');
	}
}
