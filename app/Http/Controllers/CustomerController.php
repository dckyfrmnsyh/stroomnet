<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// indoregion DATA
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use Jenssegers\Date\Date;
use Ramsey\Uuid\Uuid;
use Session;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::pluck('name', 'id');
        return view('users.new_customer.create', [
            'provinces' => $provinces,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provinsi = Province::where('id',$request->province)->first();
        $kota = City::where('id',$request->regencies)->first();
        $kecamatan = District::where('id',$request->districts)->first();
        $desa = Village::where('id',$request->villages)->first();

        $customer_id = Uuid::uuid4();
        $customer = Customer::insert([
            'id' => $customer_id,

            'tipe' => 'new',

            'tgl_hari_ini' => $date = Date::now()->format('Y-m-d H:i:s','Indonesian'),

            'nama_customer' => $request->nama_customer,
            'desa' => $desa->name,
            'kecamatan' => $kecamatan->name,
            'kota' => $kota->name,
            'provinsi' => $provinsi->name,

            'kode_pos' => $request->kode_pos,

            'penanggung_jawab' => $request->penanggungjawab,
            'jabatan_penanggung_jawab' => $request->jabatan_penanggungjawab,
            'no_ktp_penanggung_jawab' => $request->nomor_ktp_penanggungjawab,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tanggal_lahir,
            'alamat_kantor' => $request->alamat_kantor,
            'no_hp' => $request->nomor_hp,
            'email_penanggung_jawab' => $request->email_penanggungjawab,

            'no_telp' => $request->no_telp,
            'no_fax' => $request->no_fax,
            'grup' => $request->grup_instansi,
            'nama_brand' => $request->nama_brand,
            'jenis_usaha' => $request->jenis_usaha,
            'email_perusahaan' => $request->email_perusahaan,
            'npwp_perusahaan' => $request->npwp_perusahaan,

            'nama_keuangan' => $request->pic_keuangan,
            'jabatan_keuangan' => $request->jabatan_keuangan,
            'email_keuangan' => $request->email_keuangan,
            'no_hp_keuangan' => $request->no_keuangan,

            'nama_teknis' => $request->pic_teknis,
            'jabatan_teknis' => $request->jabatan_teknis,
            'email_teknis' => $request->email_teknis,
            'no_hp_teknis' => $request->no_teknis,
        ]);

        $request->session()->put('customer_id', $customer_id);

        return redirect()->route('order.create');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function old_create()
    {
        $provinces = Province::pluck('name', 'id');
        return view('users.old_customer.create', [
            'provinces' => $provinces,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function old_store(Request $request)
    {
        $provinsi = Province::where('id',$request->province)->first();
        $kota = City::where('id',$request->regencies)->first();
        $kecamatan = District::where('id',$request->districts)->first();
        $desa = Village::where('id',$request->villages)->first();

        $customer_id = Uuid::uuid4();
        $customer = Customer::insert([
            'id' => $customer_id,

            'tipe' => $request->tipe,

            'tgl_hari_ini' => $date = Date::now()->format('Y-m-d H:i:s','Indonesian'),

            'nama_customer' => $request->nama_customer,
            'desa' => $desa->name,
            'kecamatan' => $kecamatan->name,
            'kota' => $kota->name,
            'provinsi' => $provinsi->name,

            'kode_pos' => $request->kode_pos,

            'penanggung_jawab' => $request->penanggungjawab,
            'jabatan_penanggung_jawab' => $request->jabatan_penanggungjawab,
            'no_ktp_penanggung_jawab' => $request->nomor_ktp_penanggungjawab,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tanggal_lahir,
            'alamat_kantor' => $request->alamat_kantor,
            'no_hp' => '-',
            'email_penanggung_jawab' => '-',

            'no_telp' => $request->no_telp,
            'no_fax' => $request->no_fax,
            'grup' => '-',
            'nama_brand' => '-',
            'jenis_usaha' => '-',
            'email_perusahaan' => '-',
            'npwp_perusahaan' => '-',

            'nama_keuangan' => '-',
            'jabatan_keuangan' => '-',
            'email_keuangan' => '-',
            'no_hp_keuangan' => '-',

            'nama_teknis' => '-',
            'jabatan_teknis' => '-',
            'email_teknis' => '-',
            'no_hp_teknis' => '-',
        ]);


        $request->session()->put('customer_id', $customer_id);

        return redirect()->route('order.old_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
