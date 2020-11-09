<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// indoregion DATA
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class AlamatController extends Controller
{
    public function alamat(){
        $provinces = Province::pluck('name', 'id');
        return view('contoh_alamat', [
            'provinces' => $provinces,
        ]);
    }
    public function alamatKota($id){
        if($id==0){
            $regencies = City::all();
        }else{
            $regencies = City::where('province_id','=',$id)->get();
        }
        return $regencies;
    }
    public function alamatKec($id){
        if($id==0){
            $districts = District::all();
        }else{
            $districts = District::where('city_id','=',$id)->get();
        }
        return $districts;
    }
    public function alamatDesa($id){
        if($id==0){
            $villages = Village::all();
        }else{
            $villages = Village::where('district_id','=',$id)->get();
        }
        return $villages;
    }
}
