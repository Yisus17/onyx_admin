<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableFieldsInvoice extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::table('invoices', function (Blueprint $table) {
      $table->string('validity')->nullable()->change();
      $table->string('address')->nullable()->change();
      $table->string('payment_conditions')->nullable()->change();
      $table->string('payment_method')->nullable()->change();
      $table->float('tax_percentage')->nullable()->change();

      $table->dateTime('delivery_date')->nullable()->change();
      $table->dateTime('return_date')->nullable()->change();
      $table->dateTime('instalation_date')->nullable()->change();
      $table->dateTime('start_date')->nullable()->change();
      $table->dateTime('end_date')->nullable()->change();
      $table->dateTime('uninstalation_date')->nullable()->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('invoices', function (Blueprint $table) {
      $table->string('validity')->nullable(false)->change();
      $table->string('address')->nullable(false)->change();
      $table->string('payment_conditions')->nullable(false)->change();
      $table->string('payment_method')->nullable(false)->change();
      $table->float('tax_percentage')->nullable(false)->change();

      $table->dateTime('delivery_date')->nullable(false)->change();
      $table->dateTime('return_date')->nullable(false)->change();
      $table->dateTime('instalation_date')->nullable(false)->change();
      $table->dateTime('start_date')->nullable(false)->change();
      $table->dateTime('end_date')->nullable(false)->change();
      $table->dateTime('uninstalation_date')->nullable(false)->change();
    });
  }
}
