<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan_orders', function (Blueprint $table) {
            $table->id();
            $table->string('list_id');
            $table->string('originating');
            $table->string('terminating');
            $table->string('nama_layanan');
            $table->integer('biaya_langganan');
            $table->integer('biaya_instalasi');
            $table->string('kapasitas');
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
        Schema::dropIfExists('layanan_orders');
    }
}
