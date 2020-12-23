<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahanRevisiLagiiiiiiiii extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fb', function (Blueprint $table) {
            $table->string('status')->nullable();
        });
        Schema::table('data_orders', function (Blueprint $table) {
            $table->string('nama_pj')->nullable();
            $table->string('jabatan_pj')->nullable();
            $table->string('status_publish')->nullable();
            $table->string('status_biaya')->nullable();
            $table->string('status_tagihan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fb', function (Blueprint $table) {
            $table->string('status');
        });
        Schema::table('data_orders', function (Blueprint $table) {
            $table->string('nama_pj');
            $table->string('jabatan_pj');
            $table->string('status_publish');
            $table->string('status_biaya');
            $table->string('status_tagihan');
        });
    }
}
