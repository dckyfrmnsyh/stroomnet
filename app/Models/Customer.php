<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'tgl_hari_ini','nama_customer','penanggung_jawab','jabatan_penanggung_jawab','no_ktp_penanggung_jawab',
        'tempat_lahir','tgl_lahir','desa','kecamatan','kota','provinsi','alamat_kantor','no_hp','Email_penanggung_jawab','no_fax','no_telp','grup','nama_brand',
        'jenis_usaha','email_perusahaan','npwp_perusahaan','nama_keuangan','jabatan_keuangan','email_keuangan',
        'no_hp_keuangan','nama_teknis','jabatan_teknis','email_teknis','no_hp_teknis'
    ];

    public $incrementing = false;

    public function order()
    {
        return $this->hasMany('App\Models\Order', 'customer_id','id');
    }
    public function oldorder()
    {
        return $this->hasMany('App\Models\Oldorder', 'customer_id','id');
    }
}
