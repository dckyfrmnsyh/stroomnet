<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DataIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_pihak_icons')->insert([
            'nama_pj'=> 'Agus Widya Santoso',
            'jabatan_pj'=> 'Plt General Manager SBU Regional Jawa Bagian Timur',
            'alamat'=> 'Jl. Ketintang Baru 1 No. 1-3 Surabaya 60231',
            'no_telp'=> '(031) 827 3399 / 827 0033',
            'no_fax'=> '(031) 8286611',
        ]);
    }
}
