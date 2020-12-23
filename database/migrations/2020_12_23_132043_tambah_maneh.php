<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahManeh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_pihak_icons', function (Blueprint $table) {
            $table->string('nama_pj');
            $table->string('jabatan_pj');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('no_fax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_pihak_icons', function (Blueprint $table) {
            $table->string('nama_pj');
            $table->string('jabatan_pj');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('no_fax');
        });
    }
}
