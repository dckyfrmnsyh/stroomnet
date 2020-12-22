<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fb', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('user_login');

            $table->date('tgl_billing');

            $table->string('virtual_account')->nullable();

            //nama instansi
            $table->string('nama_customer');
            // info perusahaan
            $table->string('grup');
            $table->string('nama_brand');
            $table->string('jenis_usaha');
            // alamat
            $table->string('desa'); 
            $table->string('kecamatan'); 
            $table->string('kota'); 
            $table->string('provinsi'); 
            $table->string('alamat_kantor');
            $table->string('kode_pos'); 
            $table->string('alamat_situs');
            $table->string('email_perusahaan');
            $table->string('npwp_perusahaan');
            $table->string('code_fax'); 
            $table->string('no_fax'); 
            $table->string('code_telp'); 
            $table->string('no_telp'); 

            
            
            // penanggung jawab
            $table->string('penanggung_jawab');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jabatan_pj');
            $table->string('code_fax_pj'); 
            $table->string('no_fax_pj'); 
            $table->string('code_telp_pj'); 
            $table->string('no_telp_pj'); 
            $table->string('id_card_pj');
            $table->string('no_id_card_pj');
            $table->string('valid_until_card_pj');
            $table->string('email_pj');

            // keuangan
            $table->string('nama_keuangan');
            $table->string('bagian_keuangan');
            $table->string('jabatan_keuangan');
            $table->string('code_fax_keuangan'); 
            $table->string('no_fax_keuangan'); 
            $table->string('code_telp_keuangan'); 
            $table->string('no_telp_keuangan'); 
            $table->string('email_keuangan');
            
            //teknis
            $table->string('nama_teknis');
            $table->string('jabatan_teknis');
            $table->string('bagian_teknis');
            $table->string('code_fax_teknis'); 
            $table->string('no_fax_teknis'); 
            $table->string('code_telp_teknis'); 
            $table->string('no_telp_teknis');
            $table->string('no_hp_teknis');
            $table->string('email_teknis');
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
        Schema::dropIfExists('fb');
        Schema::table('fb', function(Blueprint $table)
        {
            $table->dropForeign('user_id'); //
        });
    }
}
