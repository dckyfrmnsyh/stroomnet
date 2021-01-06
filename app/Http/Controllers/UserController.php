<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\Oldorder;
use Jenssegers\Date\Date;
use Ramsey\Uuid\Uuid;
use Session;
use DB;
use Auth;
use App\Models\ListOrder;
use App\Models\OrderLayanan;
use App\Models\OrderData;
use App\Models\FB;
use App\User;

use Carbon;

// indoregion DATA
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $count_fb = FB::where('user_id',$user_id)->count();
        return view('users.index',compact('count_fb'));
    }
    public function profile(Request $request)
    {
        $user_id = Auth::id();
        $fb = FB::where('user_id',$user_id)->first();
        $data = FB::where('user_id',$user_id)->first();
        $count_fb = FB::where('user_id',$user_id)->count();
        if($count_fb != 0){
            $list = ListOrder::where('fb_id',$fb->id)->get();
            $list_order = ListOrder::where('fb_id',$fb->id)->paginate(10);
    
            foreach($list as $item){
                $user = User::where('id',$item->order_data->user_login)->first();
                $nama_user[$item->order_data->id] = $user->name;
            }
        }else{
            
        }
        $request->session()->forget('list_order_id_user');
        return view('users.profile.index',compact('fb','data','nama_user','list_order','count_fb'));
    }
    public function showfb(){
        $data = FB::where('user_id',Auth::id())->first();
        $fb = FB::where('user_id',Auth::id())->get();
        $count_fb = FB::where('user_id',Auth::id())->count();
        $icons = DB::table('data_pihak_icons')->first();
        return view('users.FB.show',compact('fb','icons','data','count_fb'));
    }
    public function createfb(){
        $data = FB::where('user_id',Auth::id())->first();
        $count_fb = FB::where('user_id',Auth::id())->count();
        $customer = User::find(Auth::id());
        $provinces = Province::pluck('name', 'id');

        return view('users.FB.create',compact('customer','data','provinces','count_fb'));
    }
    public function storefb(Request $request){
        $provinsi = Province::where('id',$request->provinsi)->first();
        $kota = City::where('id',$request->kota)->first();
        $kecamatan = District::where('id',$request->kecamatan)->first();
        $desa = Village::where('id',$request->desa)->first();

        $customer = FB::insert([
            'user_id' => Auth::id(),
            'user_login' => Auth::id(),

            'nomor_fb' => $request->nomor_fb,
            'tgl_billing' => $request->tgl_billing,
            'status' => $request->status,
            'virtual_account' => $request->virtual_account,

            'nama_customer' => $request->nama_customer,
            
            'grup' => $request->grup,
            'nama_brand' => $request->nama_brand,
            'jenis_usaha' => $request->jenis_usaha,
            'desa' => $desa->name,
            'kecamatan' => $kecamatan->name,
            'kota' => $kota->name,
            'provinsi' => $provinsi->name,
            'alamat_kantor' => $request->alamat_kantor,
            'kode_pos' => $request->kode_pos,
            'alamat_situs' => $request->alamat_situs,
            'email_perusahaan' => $request->email_perusahaan,
            'npwp_perusahaan' => $request->npwp_perusahaan,
            'code_telp' => $request->code_telp,
            'no_telp' => $request->no_telp,
            'code_fax' => $request->code_fax,
            'no_fax' => $request->no_fax,

            'penanggung_jawab' => $request->penanggung_jawab,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jabatan_pj' => $request->jabatan_pj,
            'code_fax_pj' => $request->code_fax_pj, 
            'no_fax_pj' => $request->no_fax_pj, 
            'code_telp_pj' => $request->code_telp_pj, 
            'no_telp_pj' => $request->no_telp_pj, 
            'id_card_pj' => $request->id_card_pj,
            'no_id_card_pj' => $request->no_id_card_pj,
            'valid_until_card_pj' => $request->valid_until_card_pj,
            'email_pj' => $request->email_pj,
            // keuangan
            'nama_keuangan' => $request->nama_keuangan,
            'bagian_keuangan' => $request->bagian_keuangan,
            'jabatan_keuangan' => $request->jabatan_keuangan,
            'code_fax_keuangan' => $request->code_fax_keuangan, 
            'no_fax_keuangan' => $request->no_fax_keuangan, 
            'code_telp_keuangan' => $request->code_telp_keuangan, 
            'no_telp_keuangan' => $request->no_telp_keuangan, 
            'email_keuangan' => $request->email_keuangan,
            //teknis
            'nama_teknis' => $request->nama_teknis,
            'jabatan_teknis' => $request->jabatan_teknis,
            'bagian_teknis' => $request->bagian_teknis,
            'code_fax_teknis' => $request->code_fax_teknis, 
            'no_fax_teknis' => $request->no_fax_teknis, 
            'code_telp_teknis' => $request->code_telp_teknis, 
            'no_telp_teknis' => $request->no_telp_teknis,
            'no_hp_teknis' => $request->no_hp_teknis,
            'email_teknis' => $request->email_teknis,

            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('users.profile');
    }
    public function editfb(){
        $data = FB::where('user_id',Auth::id())->first();
        $customer = FB::where('user_id',Auth::id())->first();
        $fb = FB::where('user_id',Auth::id())->get();
        $count_fb = FB::where('user_id',Auth::id())->count();
        $provinces = Province::pluck('name', 'id');
        $provinsi = Province::where('name',$data->provinsi)->first();
        $kota = City::where([
            ['province_id',$provinsi->id],
            ['name',$data->kota]
            ])->first();
        $kecamatan = District::where([
            ['city_id',$kota->id],
            ['name',$data->kecamatan],
            ])->first();
        $desa = Village::where([
            ['district_id',$kecamatan->id],
            ['name',$data->desa],
            ])->first();
        return view('users.FB.edit',compact('fb','customer','data','count_fb','provinces','desa','kecamatan','kota','provinsi'));
    }

    public function updatefb(Request $request){
        $provinsi = Province::where('id',$request->provinsi)->first();
        $kota = City::where('id',$request->kota)->first();
        $kecamatan = District::where('id',$request->kecamatan)->first();
        $desa = Village::where('id',$request->desa)->first();

        $data = FB::where('user_id','=',Auth::id())->first();

        $data->user_id = Auth::id();
        $data->user_login = Auth::id();

        $data->nomor_fb = $request->nomor_fb;
        $data->tgl_billing = $request->tgl_billing;
        $data->status = $request->status;
        $data->virtual_account = $request->virtual_account;

        $data->nama_customer = $request->nama_customer;
        
        $data->grup = $request->grup;
        $data->nama_brand = $request->nama_brand;
        $data->jenis_usaha = $request->jenis_usaha;
        $data->desa = $desa->name;
        $data->kecamatan = $kecamatan->name;
        $data->kota = $kota->name;
        $data->provinsi = $provinsi->name;
        $data->alamat_kantor = $request->alamat_kantor;
        $data->kode_pos = $request->kode_pos;
        $data->alamat_situs = $request->alamat_situs;
        $data->email_perusahaan = $request->email_perusahaan;
        $data->npwp_perusahaan = $request->npwp_perusahaan;
        $data->code_telp = $request->code_telp;
        $data->no_telp = $request->no_telp;
        $data->code_fax = $request->code_fax;
        $data->no_fax = $request->no_fax;

        $data->penanggung_jawab = $request->penanggung_jawab;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jabatan_pj = $request->jabatan_pj;
        $data->code_fax_pj = $request->code_fax_pj; 
        $data->no_fax_pj = $request->no_fax_pj; 
        $data->code_telp_pj = $request->code_telp_pj; 
        $data->no_telp_pj = $request->no_telp_pj; 
        $data->id_card_pj = $request->id_card_pj;
        $data->no_id_card_pj = $request->no_id_card_pj;
        $data->valid_until_card_pj = $request->valid_until_card_pj;
        $data->email_pj = $request->email_pj;
        // keuangan
        $data->nama_keuangan = $request->nama_keuangan;
        $data->bagian_keuangan = $request->bagian_keuangan;
        $data->jabatan_keuangan = $request->jabatan_keuangan;
        $data->code_fax_keuangan = $request->code_fax_keuangan; 
        $data->no_fax_keuangan = $request->no_fax_keuangan; 
        $data->code_telp_keuangan = $request->code_telp_keuangan; 
        $data->no_telp_keuangan = $request->no_telp_keuangan; 
        $data->email_keuangan = $request->email_keuangan;
        //teknis
        $data->nama_teknis = $request->nama_teknis;
        $data->jabatan_teknis = $request->jabatan_teknis;
        $data->bagian_teknis = $request->bagian_teknis;
        $data->code_fax_teknis = $request->code_fax_teknis; 
        $data->no_fax_teknis = $request->no_fax_teknis; 
        $data->code_telp_teknis = $request->code_telp_teknis; 
        $data->no_telp_teknis = $request->no_telp_teknis;
        $data->no_hp_teknis = $request->no_hp_teknis;
        $data->email_teknis = $request->email_teknis;

        $data->updated_at = Carbon::now();

        $data->save();

        return redirect()->route('users.profile');
    }

    public function bakbb_new(Request $request){
        $fb = FB::where('user_id', '=', Auth::id())->first();
        $list_id = Session::get('list_order_id_user');
        $data = ListOrder::get();
        $order_data = OrderData::where('list_id', '=', $list_id)->get();
        
        $layanan = OrderLayanan::where([['list_id', $list_id],['tipe','new']])->get();

        $count = OrderData::where('list_id', '=', $list_id)->count();
        if($count >= 1){
            $cek_order_data = 1;
        }
        elseif($count == 0){
            $cek_order_data = 0;
        }
        return view('users.BAKBB.new',compact('fb','layanan','test','list_id','order_data','cek_order_data'));
    }

    public function bakbb_exist(Request $request){
        $fb = FB::where('user_id', '=', Auth::id())->first();
        $list_id = Session::get('list_order_id_user');
        $data = ListOrder::get();
        $order_data = OrderData::where('list_id', '=', $list_id)->get();
        $layanan1 = OrderLayanan::where([['list_id', $list_id],['tipe','exist']])->get();
        $layanan2 = OrderLayanan::where([['list_id', $list_id],['tipe','new']])->get();

        $count = OrderData::where('list_id', '=', $list_id)->count();
        if($count >= 1){
            $cek_order_data = 1;
        }
        elseif($count == 0){
            $cek_order_data = 0;
        }
        return view('users.BAKBB.existing',compact('fb','layanan1','layanan2','test','list_id','order_data','cek_order_data'));
    }

    public function store_new(Request $request){
        $fb = FB::where('user_id', '=', Auth::id())->first();
        $list_order_id_user = Session::get('list_order_id_user');

        $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;

        OrderLayanan::insert([
            'tipe' => 'new',
            'originating' => $request->originating,
            'terminating' => $request->terminating,
            'nama_layanan' => $request->nama_product,
            'kapasitas' => $kapasitas,
            'biaya_langganan' => $request->biaya_langganan,
            'biaya_instalasi' => $request->biaya_instalasi,
            'list_id' => $list_order_id_user,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function store_exist(Request $request){
        $fb = FB::where('user_id', '=', Auth::id())->first();
        $list_order_id_user = Session::get('list_order_id_user');

        $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;

        OrderLayanan::insert([
            'tipe' => 'exist',
            'originating' => $request->originating,
            'terminating' => $request->terminating,
            'nama_layanan' => $request->nama_product,
            'kapasitas' => $kapasitas,
            'biaya_langganan' => $request->biaya_langganan,
            'biaya_instalasi' => $request->biaya_instalasi,
            'list_id' => $list_order_id_user,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function delete($id){
        $order = OrderLayanan::findOrFail($id);
        $order->delete();
        return redirect()->back();
    }

    public function store_data(Request $request)
    {
        $fb = FB::where('user_id', '=', Auth::id())->first();
        $list_order_id_user =  Uuid::uuid4()->toString();
        if($request->session()->has('list_order_id_user')){
            Session::get('list_order_id_user');
        }
        else{
            $request->session()->put('list_order_id_user', $list_order_id_user);
        }
        
        $x = ListOrder::where('id', '=', Session::get('list_order_id_user'))->count();
        if ($x == 0) {
            $list_order = ListOrder::insert([
                'id' => Session::get('list_order_id_user'),
                'fb_id' => $fb->id,	
                'created_at' => Carbon::now(),
            ]);
            
        }
        $list_order_id_user = Session::get('list_order_id_user');
        OrderData::insert([
            'list_id' => $list_order_id_user,
            'user_login' => Auth::id(),
            'tanggal_kesepakatan' => $request->tanggal_kesepakatan,
            'tipe' => $request->tipe,
            'nomor' => $request->nomor,
            'no_pihak_pertama' => $request->no_pihak_pertama,
            'no_pihak_kedua' => $request->no_pihak_kedua,
            'jangka_berlangganan' => $request->jangka_berlangganan,
            'catatan_penagihan' => $request->catatan_penagihan,
            'tanggal_penagihan' => $request->tanggal_penagihan,
            'status_publish' => $request->status_publish,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function edit_bakbb(Request $request,$id)
    {
        $data = FB::where('user_login', '=', Auth::id())->get();   
        $count = OrderData::where('list_id', '=', $id)->count();
        $item = ListOrder::where('id', '=', $id)->first();
        $fb = FB::where('id', '=', $item->fb_id)->first();
        if($count >= 1){
            $cek_order_data = 1;
        }
        elseif($count == 0){
            $cek_order_data = 0;
        }
        foreach($data as $item){
            $user = User::where('id',$item->user_login)->first();
            $nama_user[$item->id] = $user->name;
        }
        $order_data = OrderData::where('list_id', '=', $id)->first();
        $layanan1 = OrderLayanan::where([['list_id', $id],['tipe','exist']])->get();
        $layanan2 = OrderLayanan::where([['list_id', $id],['tipe','new']])->get();

        $countod = OrderData::where([['tipe', 'Layanan Baru'],['list_id', '=', $id]])->count();
        $count1 = OrderLayanan::where([['list_id', $id],['tipe','exist']])->count();
        $count2 = OrderLayanan::where([['list_id', $id],['tipe','new']])->count();

        if($countod >= 1 ){
            $cek_data_od = 1;
        }
        elseif($countod == 0 ){
            $cek_data_od = 0;
        }
        if($count1 >= 1){
            $cek_data1 = 1;
        }
        elseif($count1 == 0){
            $cek_data1 = 0;
        }
        if($count2 >= 1){
            $cek_data2 = 1;
        }
        elseif($count2 == 0){
            $cek_data2 = 0;
        }
        return view('users.BAKBB.edit',compact('layanan1','layanan2','cek_data_od','order_data','cek_data1','cek_data2','cek_order_data','fb','data','nama_user','count'));
    }
    public function update_data(Request $request,$id)
    {
        $data = OrderData::where('list_id','=',$id)->first();
        $data->tanggal_kesepakatan = $request->tanggal_kesepakatan;
        $data->tipe = $request->tipe;
        $data->nomor = $request->nomor;
        $data->no_pihak_pertama = $request->no_pihak_pertama;
        $data->no_pihak_kedua = $request->no_pihak_kedua;
        $data->jangka_berlangganan = $request->jangka_berlangganan;
        $data->catatan_penagihan = $request->catatan_penagihan;
        $data->tanggal_penagihan = $request->tanggal_penagihan;
        $data->status_publish = $request->status_publish;
        $data->updated_at = Carbon::now();
        $data->save();
        return redirect()->back();
    }

    public function update_new(Request $request, $id){

        $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;

        OrderLayanan::insert([
            'tipe' => 'new',
            'originating' => $request->originating,
            'terminating' => $request->terminating,
            'nama_layanan' => $request->nama_product,
            'kapasitas' => $kapasitas,
            'biaya_langganan' => $request->biaya_langganan,
            'biaya_instalasi' => $request->biaya_instalasi,
            'list_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function update_exist(Request $request, $id){

        $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;

        OrderLayanan::insert([
            'tipe' => 'exist',
            'originating' => $request->originating,
            'terminating' => $request->terminating,
            'nama_layanan' => $request->nama_product,
            'kapasitas' => $kapasitas,
            'biaya_langganan' => $request->biaya_langganan,
            'biaya_instalasi' => $request->biaya_instalasi,
            'list_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    













    public function download()
    {
        $customer_id = Session::get('customer_id');
        $customer = Customer::where('id',$customer_id)->get();
        return view('users.download',compact('customer'));
    }
    public function download_old()
    {
        $customer_id = Session::get('customer_id');
        $customer = Customer::where('id',$customer_id)->get();
        return view('users.download_old',compact('customer'));
    }
    public function thankyou(Request $request)
    {
        $request->session()->forget('customer_id');
        echo "<script>setTimeout(function(){ window.location.href = 'https://customer.sburegjatim.co.id/'; }, 6000);</script>";
        return view('users.thankyou');
    }
    public function deletea($id)
    {
        $customer = Customer::findOrFail($id);
        $order = Order::where('customer_id','=',$id);
        $oldorder = Oldorder::where('customer_id','=',$id);
        $order->delete();
        $oldorder->delete();
        $customer->delete();
        return redirect()->route('users.index');
    }

}
