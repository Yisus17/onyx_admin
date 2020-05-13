<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRealFieldsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('price');
            $table->dropColumn('bought_at');

            $table->string('code');
            $table->string('brand');
            $table->string('model');
            $table->string('type');
            $table->string('serial')->nullable();
            $table->float('purchase_price');
            $table->string('status');
            $table->string('bought_by');
            $table->boolean('countable');
            $table->date('purchase_date')->nullable();
            $table->integer('years_old');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name');
            $table->float('price');
            $table->date('bought_at');

            $table->dropColumn('code');
            $table->dropColumn('brand');
            $table->dropColumn('model');
            $table->dropColumn('type');
            $table->dropColumn('serial');
            $table->dropColumn('purchase_price');
            $table->dropColumn('status');
            $table->dropColumn('bought_by');
            $table->dropColumn('countable');
            $table->dropColumn('purchase_date');
            $table->dropColumn('years_old');
        });
    }
}
