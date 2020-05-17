<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatesBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('budgets', function (Blueprint $table) {
            $table->dateTime('delivery_date');
            $table->dateTime('return_date');
            $table->dateTime('instalation_date');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('uninstalation_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('budgets', function (Blueprint $table) {
            $table->dropColumn('delivery_date');
            $table->dropColumn('return_date');
            $table->dropColumn('instalation_date');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('uninstalation_date');
        });
    }
}
