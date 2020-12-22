<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_orders', function (Blueprint $table) {
            $table->id();
            $table->string('list_id');
            $table->date('tanggal_penagihan')->nullable();
            $table->string('catatan_penagihan')->nullable();
            $table->integer('jangka_berlangganan')->nullable();
            $table->string('nomor')->nullable();
            $table->string('no_pihak_pertama')->nullable();
            $table->string('no_pihak_kedua')->nullable();
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
        Schema::dropIfExists('data_orders');
    }
}
