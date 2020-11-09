<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_orders', function (Blueprint $table) {
            $table->id();
            $table->string('originating');
            $table->string('terminating');
            $table->string('nama_product');
            $table->integer('biaya_langganan');
            $table->integer('biaya_instalasi');
            $table->string('kapasitas');
            $table->string('customer_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('old_orders');
    }
}
