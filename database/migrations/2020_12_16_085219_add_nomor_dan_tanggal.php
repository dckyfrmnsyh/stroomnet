<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomorDanTanggal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fb', function (Blueprint $table) {
            $table->string('nomor_fb')->nullable()->after('id');
        });
        Schema::table('data_orders', function (Blueprint $table) {
            $table->string('tanggal_kesepakatan')->nullable()->after('list_id');
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
            $table->string('nomor_fb');
        });
        Schema::table('data_orders', function (Blueprint $table) {
            $table->string('tanggal_kesepakatan');
        });
    }
}
