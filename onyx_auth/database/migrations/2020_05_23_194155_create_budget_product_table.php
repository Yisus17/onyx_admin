<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetProductTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
			Schema::create('budget_product', function (Blueprint $table) {
                $table->bigIncrements('id');
				$table->unsignedBigInteger('budget_id');
				$table->unsignedBigInteger('product_id');
				$table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');
				$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

				$table->text('description');
				$table->integer('quantity');
				$table->float('factor');
				$table->float('unit_price');
				$table->float('discount')->nullable();
				$table->float('total_price');
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
			Schema::dropIfExists('budget_product');
    }
}
