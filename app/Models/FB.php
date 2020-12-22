<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FB extends Model
{
    protected $table = 'fb';

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y', // Change your format
        'updated_at' => 'datetime:d/m/Y',
    ];

    protected $fillable = [
        'tgl_billing',
        'virtual_account',
        'nama_customer',
        // info perusahaan
        'grup',
        'nama_brand',
        'jenis_usaha',
        // alamat
        'desa', 
        'kecamatan', 
        'kota', 
        'provinsi', 
        'alamat_kantor',
        'kode_pos', 
        'alamat_situs',
        'email_perusahaan',
        'npwp_perusahaan',
        'code_fax', 
        'no_fax', 
        'code_telp', 
        'no_telp', 
        // penanggung jawab
        'penanggung_jawab',
        'tempat_lahir',
        'tgl_lahir',
        'jabatan_pj',
        'code_fax_pj', 
        'no_fax_pj', 
        'code_telp_pj', 
        'no_telp_pj', 
        'id_card_pj',
        'no_id_card_pj',
        'valid_until_card_pj',
        'email_pj',
        // keuangan
        'nama_keuangan',
        'bagian_keuangan',
        'jabatan_keuangan',
        'code_fax_keuangan', 
        'no_fax_keuangan', 
        'code_telp_keuangan', 
        'no_telp_keuangan', 
        'email_keuangan',
        //teknis
        'nama_teknis',
        'jabatan_teknis',
        'code_fax_teknis', 
        'no_fax_teknis', 
        'code_telp_teknis', 
        'no_telp_teknis',
        'no_hp_teknis',
        'email_teknis',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function list_order()
    {
        return $this->hasMany('App\Models\ListOrder', 'fb_id','id');
    }
}
