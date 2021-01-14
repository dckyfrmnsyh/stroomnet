<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdSalesDo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_orders', function (Blueprint $table) {
            //
            $table->string('id_sales')->nullable()->after('user_login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_orders', function (Blueprint $table) {
            //
            $table->string('id_sales');
        });
    }
}
