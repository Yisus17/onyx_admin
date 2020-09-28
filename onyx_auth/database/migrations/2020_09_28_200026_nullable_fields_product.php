<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableFieldsProduct extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::table('products', function (Blueprint $table) {
      $table->string('brand')->nullable()->change();
      $table->string('model')->nullable()->change();
      $table->string('type')->nullable()->change();
      $table->float('purchase_price')->nullable()->change();
      $table->string('status')->nullable()->change();
      $table->string('bought_by')->nullable()->change();
      $table->boolean('countable')->nullable()->change();
      $table->integer('years_old')->nullable()->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::table('products', function (Blueprint $table) {
      $table->string('brand')->nullable(false)->change();
      $table->string('model')->nullable(false)->change();
      $table->string('type')->nullable(false)->change();
      $table->float('purchase_price')->nullable(false)->change();
      $table->string('status')->nullable(false)->change();
      $table->string('bought_by')->nullable(false)->change();
      $table->boolean('countable')->nullable(false)->change();
      $table->integer('years_old')->nullable(false)->change();
    });
  }
}
