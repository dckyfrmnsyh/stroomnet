<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id');
            $table->dateTime('tgl_hari_ini');

            //tipe
            $table->string('tipe'); //new

            //nama instansi
            $table->string('nama_customer');

            // penanggung jawab
            $table->string('penanggung_jawab');
            $table->string('jabatan_penanggung_jawab');
            $table->string('no_ktp_penanggung_jawab');
            $table->string('tempat_lahir');
            $table->dateTime('tgl_lahir');
            $table->string('no_hp');
            $table->string('Email_penanggung_jawab');

            // info perusahaan
            $table->string('desa'); //new
            $table->string('kecamatan'); //new
            $table->string('kota'); //new
            $table->string('provinsi'); //new
            $table->string('alamat_kantor');
            $table->string('kode_pos'); //new
            $table->string('no_fax'); //edit
            $table->string('no_telp'); //edit
            $table->string('grup');
            $table->string('nama_brand');
            $table->string('jenis_usaha');
            $table->string('email_perusahaan');
            $table->string('npwp_perusahaan');

            // keuangan
            $table->string('nama_keuangan');
            $table->string('jabatan_keuangan');
            $table->string('email_keuangan');
            $table->string('no_hp_keuangan');

            //teknis
            $table->string('nama_teknis');
            $table->string('jabatan_teknis');
            $table->string('email_teknis');
            $table->string('no_hp_teknis');
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
        Schema::dropIfExists('customers');
    }
}
