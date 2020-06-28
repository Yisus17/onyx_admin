<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRealFieldsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('lastname');
            $table->string('postal_code')->nullable();
            $table->string('business_name');
            $table->unsignedBigInteger('client_type_id')->nullable();
            $table->foreign('client_type_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('community_id')->nullable();
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('postal_code');
            $table->dropColumn('business_name');
        });
    }
}
