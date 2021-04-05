<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// indoregion DATA
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

use App\Models\Product;
use App\Models\Customer;
use App\Models\FB;
use App\Models\Order;
use App\Models\Oldorder;
use App\Models\ListOrder;
use App\Models\OrderLayanan;
use App\Models\OrderData;
use App\User;

use Ramsey\Uuid\Uuid;

use Session;
use PDF;
use Auth;
use DB;
use Carbon;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Menu Customer
        // --customer-- //
            public function customer(){
                $customer = User::role('customer')->orderBy('created_at', 'DESC')->paginate(15);

                
                foreach($customer as $data){
                    $countfb = FB::where('user_id','=',$data->id)->count();
                    $fb1 = FB::where('user_id','=',$data->id)->first();
                    $setbtn[$data->id] = $countfb;
                    $fb[$data->id] = $fb1['status'];
                }
                return view('admin.customer.index',compact('customer','fb','setbtn'));
            }
            public function acc_store(Request $request){
                $customer = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
                $customer->assignRole('customer');
                return redirect()->back();
            }
            public function acc_edit(Request $request, $id){
                $customer = User::where('id','=',$id)->first();
                return view('admin.customer.edit')->with([
                    'customer' => $customer
                ]);
            }
            public function acc_update(Request $request, $id){
                $customer = User::where('id','=',$id)->first();
                $customer->name =$request->name;
                $customer->email =$request->email;
                $customer->password =$request->password;
                if($request->has('password')){
                    $customer['password'] = bcrypt($customer['password']);
                }
                else{
                    $customer = array_excep($customer,['password']);
                }
                $customer->save();
                return redirect()->route('customer');
            }
        // --FB-- //
            public function createfb(Request $request, $id){
                $customer = User::find($id);
                
                $provinces = Province::pluck('name', 'id');
                $sales = User::role('sales')->pluck('name', 'id');
                return view('admin.customer.createfb',compact('customer','provinces','sales'));
            }
            public function storefb(Request $request, $id){
                $provinsi = Province::where('id',$request->provinsi)->first();
                $kota = City::where('id',$request->kota)->first();
                $kecamatan = District::where('id',$request->kecamatan)->first();
                $desa = Village::where('id',$request->desa)->first();

                $customer = FB::insert([
                    'user_id' => $id,
                    'user_login' => Auth::id(),
                    'id_sales' => $request->sales,

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

                return redirect()->route('customer');
            }

            public function showfb(Request $request, $id){
                $customer = User::find($id);
                $sales = User::role('sales')->pluck('name', 'id');
                $data = FB::where('user_id','=',$customer->id)->first();
                $salescek = User::where('id',$data->id_sales)->first();
                $salescek1 = User::where('id',$data->id_sales)->count();
                if($salescek1 == 1){
                    $nama_sales = $salescek->name;
                }
                $provinces = Province::pluck('name', 'id');
                $icons = DB::table('data_pihak_icons')->first();
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

                $fb = FB::where('user_id',$id)->get();

                return view('admin.customer.showfb',compact('nama_sales','sales','fb','icons','data','customer','provinces','desa','kecamatan','kota','provinsi'));
            }
            public function updatefb(Request $request, $id){
                $provinsi = Province::where('id',$request->provinsi)->first();
                $kota = City::where('id',$request->kota)->first();
                $kecamatan = District::where('id',$request->kecamatan)->first();
                $desa = Village::where('id',$request->desa)->first();

                $customer = User::find($id);
                $data = FB::where('user_id','=',$customer->id)->first();

                $data->user_id = $id;
                $data->user_login = Auth::id();
                $data->id_sales = $request->sales;

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

                return redirect()->route('customer');
            }


    // Menu Order
        // --BAKBB-- //
            public function beranda(Request $request){
                $data = FB::where('id_sales', '=', Auth::id())->get();
                
                $list_order = ListOrder::with(['fb' => function ($query) {
                    $query->where('id_sales','=', Auth::id());
                }])->orderBy('created_at', 'DESC')->paginate(10);
        // dd($list_order);
                foreach($list_order as $list){
                    $fbcek = FB::where('id', '=', $list->fb_id)->first();
                    $nama_customer[$list->id] = $fbcek->nama_customer;
                    $usercek =  User::where('id', '=', $list->order_data->user_login)->first();
                    $nama_user[$list->order_data->id] = $usercek->name;
                }
                $request->session()->forget('list_order_id');

                // tambahan count data dan linechart
                $revenue = DB::table('users')
                    ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                    ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                    ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                    ->where([['model_has_roles.role_id',2],['fb.id_sales',Auth::id()]])
                    ->sum('layanan_orders.biaya_langganan');
                // count orderan by id sales count layanan orders
                $xx = FB::where('id_sales',Auth::id())->get();
                if($xx != null){
                    foreach($xx as $row){
                        $yy[$row->id] = ListOrder::where('fb_id',$row->id)->count();
                        $terjual    =array_sum($yy);
                    }
                }
                // count orderan by id sales count fb
                $customer = FB::where('id_sales',Auth::id())->count();

                //line chart pendapatan
                for($i=0; $i<12; $i++){
                    $lc_revenue[$i] = DB::table('users')
                        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                        ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                        ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                        ->whereMonth('list_orders.created_at', $i+1)
                        ->whereYear('list_orders.created_at', Carbon::now()->year)
                        ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                        ->where([['model_has_roles.role_id',2],['fb.id_sales',Auth::id()]])
                        ->sum('layanan_orders.biaya_langganan');
                }

                //if admin
                // tambahan count data dan linechart
                $revenue1 = DB::table('users')
                    ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                    ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                    ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                    ->sum('layanan_orders.biaya_langganan');
                // count orderan by id sales count layanan orders
                $terjual1 = ListOrder::count();
                // count orderan by id sales count fb
                $customer1 = FB::count();

                //line chart pendapatan
                for($i=0; $i<12; $i++){
                    $lc_revenue1[$i] = DB::table('users')
                        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                        ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                        ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                        ->whereMonth('list_orders.created_at', $i+1)
                        ->whereYear('list_orders.created_at', Carbon::now()->year)
                        ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                        ->sum('layanan_orders.biaya_langganan');
                }
                    // dd($lc_revenue);
                return view('admin.order.index',compact('list_order','data','nama_user','nama_customer','revenue','customer','terjual','lc_revenue','revenue1','customer1','terjual1','lc_revenue1'));
            }
            public function view_order_all(Request $request){
                
                $data =  ListOrder::with('fb')->orderBy('created_at', 'DESC')->paginate(10);
                foreach($data as $item){
                    $user = User::where('id',$item->order_data->user_login)->first();
                    $sales = User::where('id',$item->fb->id_sales)->first();
                    $nama_user[$item->order_data->id] = $user->name;
                    $nama_sales[$item->order_data->id] = $sales->name;
                }
                $request->session()->forget('list_order_id');
                return view('admin.order.viewall',compact('data','nama_user','nama_sales'));
            }
            public function edit_list_order(Request $request,$id)
            {
                $data = FB::where('user_login', '=', Auth::id())->get();   
                $count = OrderData::where('list_id', '=', $id)->count();
                $item = ListOrder::where('id', '=', $id)->first();
                $fb = FB::where('id', '=', $item->fb_id)->first();
                $order_data1 = OrderData::where('list_id', '=', $id)->get();
                $order_data = OrderData::where('list_id', '=', $id)->first();
                $sales = User::role('sales')->pluck('name', 'id');
                if($count >= 1){
                    $cek_order_data = 1;
                }
                elseif($count == 0){
                    $cek_order_data = 0;
                }
                $salescek = User::where('id',$fb->id_sales)->first();
                $salescek1 = User::where('id',$fb->id_sales)->count();
                if($salescek1 == 1){
                    $nama_sales = $salescek->name;
                }
                
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
                if($count1 >= 1 ){
                    $cek_data1 = 1;
                }
                elseif($count1 == 0 ){
                    $cek_data1 = 0;
                }
                if($count2 >= 1){
                    $cek_data2 = 1;
                }
                elseif($count2 == 0){
                    $cek_data2 = 0;
                }
                return view('admin.order.edit',compact('sales','nama_sales','layanan1','cek_data_od','layanan2','order_data','cek_data1','cek_data2','cek_order_data','fb','data','nama_user','count'));
            }
            public function update_data(Request $request,$id)
            {
                $data = OrderData::where('list_id','=',$id)->first();
                $data->tanggal_kesepakatan = $request->tanggal_kesepakatan;
                $data->tipe = $request->tipe;
                $data->nomor = $request->nomor;
                $data->nama_pj = $request->nama_pj;
                $data->jabatan_pj = $request->jabatan_pj;
                $data->no_pihak_pertama = $request->no_pihak_pertama;
                $data->no_pihak_kedua = $request->no_pihak_kedua;
                $data->jangka_berlangganan = $request->jangka_berlangganan;
                $data->status_biaya = $request->status_biaya;
                $data->status_tagihan = $request->status_tagihan;
                $data->catatan_penagihan = $request->catatan_penagihan;
                $data->tanggal_penagihan = $request->tanggal_penagihan;
                $data->status_publish = $request->status_publish;
                $data->updated_at = Carbon::now();
                $data->save();
                return redirect()->back();
            }

            public function update_layanan1(Request $request, $id){

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
            public function update_layanan2(Request $request, $id){

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
            public function delete_layanan($id){
                $order = OrderLayanan::findOrFail($id);
                $order->delete();
                return redirect()->back();
            }

            public function delete_list_order($id)
            {
                $list = ListOrder::where('id','=',$id);
                $layanan = OrderLayanan::where('list_id','=',$id);
                $data = OrderData::where('list_id','=',$id);
                $list->delete();
                $layanan->delete();
                $data->delete();
                return redirect()->back();
            }

            public function search(Request $request){
                return view('admin.order.search');
            }

            public function action_search(Request $request)
            {
                if($request->ajax()){
                    $output = '';
                    $query = $request->get('query');
                    if($query != ''){
                    $data = DB::table('fb')
                        ->where('nama_customer', 'like', '%'.$query.'%')
                        ->get();
                    }
                    else{
                        $data = DB::table('fb')
                            ->orderBy('created_at', 'desc')
                            ->get();
                    }
                    $total_row = $data->count();
                    if($total_row > 0){
                        foreach($data as $row){
                            $output .= '
                            <tr>
                            <td>'.$row->nama_customer.'</td>
                            <td>'.$row->penanggung_jawab.'</td>
                            <td>'."<a href='/Admin/order/create/$row->id/BAKBB/new'  class='btn btn-sm btn-success'><i class='fa fa-plus'></i> New</a>
                            <a href='/Admin/order/create/$row->id/BAKBB/existing'  class='btn btn-sm btn-danger'><i class='fa fa-plus'></i> Existing</a>".'</td>
                            </tr>
                            ';
                        }
                    }
                    else{
                        $output = '
                        <tr>
                            <td align="center" colspan="3">No Data Found</td>
                        </tr>
                        ';
                    }
                    $data = array(
                    'table_data'  => $output,
                    'total_data'  => $total_row
                    );

                    echo json_encode($data);
                }
            }

            public function bakbb_new(Request $request, $id){
                $fb = FB::where('id', '=', $id)->first();
                $list_id = Session::get('list_order_id');
                $data = ListOrder::get();
                $sales = User::role('sales')->pluck('name', 'id');
                $order_data = OrderData::where('list_id', '=', $list_id)->get();
                
                $layanan = OrderLayanan::where([['list_id', $list_id],['tipe','new']])->get();

                $count = OrderData::where('list_id', '=', $list_id)->count();
                if($count >= 1){
                    $cek_order_data = 1;
                    foreach($order_data as $item){
                        $salescek = User::where('id',$fb->id_sales)->first();
                        $salescek1 = User::where('id',$fb->id_sales)->count();
                        if($salescek1 == 1){
                            $nama_sales = $salescek->name;
                        }
                    }
                }
                elseif($count == 0){
                    $cek_order_data = 0;
                }
                return view('admin.order.new',compact('nama_sales','sales','fb','layanan','test','list_id','order_data','cek_order_data'));
            }

            public function store_bakbb_new(Request $request, $id){
                $fb = FB::where('id', '=', $id)->first();
                $list_order_id = Session::get('list_order_id');

                $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;

                OrderLayanan::insert([
                    'tipe' => 'new',
                    'originating' => $request->originating,
                    'terminating' => $request->terminating,
                    'nama_layanan' => $request->nama_product,
                    'kapasitas' => $kapasitas,
                    'biaya_langganan' => $request->biaya_langganan,
                    'biaya_instalasi' => $request->biaya_instalasi,
                    'list_id' => $list_order_id,
                    'created_at' => Carbon::now(),
                ]);
                return redirect()->back();
            }
            public function delete_new($id){
                $order = OrderLayanan::findOrFail($id);
                $order->delete();
                return redirect()->back();
            }

            public function store_data_order(Request $request, $id)
            {
                $fb = FB::where('id', '=', $id)->first();
                $list_order_id =  Uuid::uuid4()->toString();
                if($request->session()->has('list_order_id')){
                    Session::get('list_order_id');
                }
                else{
                    $request->session()->put('list_order_id', $list_order_id);
                }
                
                $x = ListOrder::where('id', '=', Session::get('list_order_id'))->count();
                if ($x == 0) {
                    $list_order = ListOrder::insert([
                        'id' => Session::get('list_order_id'),
                        'fb_id' => $fb->id,	
                        'created_at' => Carbon::now(),
                    ]);
                    
                }
                $list_order_id = Session::get('list_order_id');
                OrderData::insert([
                    'list_id' => $list_order_id,
                    'user_login' => Auth::id(),
                    'tanggal_kesepakatan' => $request->tanggal_kesepakatan,
                    'tipe' => $request->tipe,
                    'nomor' => $request->nomor,
                    'nama_pj' => $request->nama_pj,
                    'jabatan_pj' => $request->jabatan_pj,
                    'no_pihak_pertama' => $request->no_pihak_pertama,
                    'no_pihak_kedua' => $request->no_pihak_kedua,
                    'jangka_berlangganan' => $request->jangka_berlangganan,
                    'status_biaya' => $request->status_biaya,
                    'status_tagihan' => $request->status_tagihan,
                    'catatan_penagihan' => $request->catatan_penagihan,
                    'tanggal_penagihan' => $request->tanggal_penagihan,
                    'status_publish' => $request->status_publish,
                    'created_at' => Carbon::now(),
                ]);
                return redirect()->back();
            }

            public function bakbb_existing(Request $request, $id){
                $fb = FB::where('id', '=', $id)->first();
                $list_id = Session::get('list_order_id');
                $data = ListOrder::get();
                $sales = User::role('sales')->pluck('name', 'id');
                $order_data = OrderData::where('list_id', '=', $list_id)->get();
                $layanan1 = OrderLayanan::where([['list_id', $list_id],['tipe','exist']])->get();
                $layanan2 = OrderLayanan::where([['list_id', $list_id],['tipe','new']])->get();

                $count = OrderData::where('list_id', '=', $list_id)->count();
                if($count >= 1){
                    $cek_order_data = 1;
                    $salescek = User::where('id',$fb->id_sales)->first();
                    $salescek1 = User::where('id',$fb->id_sales)->count();
                    if($salescek1 == 1){
                        $nama_sales = $salescek->name;
                    }
                }
                elseif($count == 0){
                    $cek_order_data = 0;
                }
                return view('admin.order.existing',compact('nama_sales','sales','fb','layanan1','layanan2','test','list_id','order_data','cek_order_data'));
            }

            public function store_bakbb_existing(Request $request, $id){
                $fb = FB::where('id', '=', $id)->first();
                $list_order_id = Session::get('list_order_id');

                $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;

                OrderLayanan::insert([
                    'tipe' => 'exist',
                    'originating' => $request->originating,
                    'terminating' => $request->terminating,
                    'nama_layanan' => $request->nama_product,
                    'kapasitas' => $kapasitas,
                    'biaya_langganan' => $request->biaya_langganan,
                    'biaya_instalasi' => $request->biaya_instalasi,
                    'list_id' => $list_order_id,
                    'created_at' => Carbon::now(),
                ]);
                return redirect()->back();
            }
            public function store_bakbb_newexisting(Request $request, $id){
                $fb = FB::where('id', '=', $id)->first();
                $list_order_id = Session::get('list_order_id');

                $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;

                OrderLayanan::insert([
                    'tipe' => 'new',
                    'originating' => $request->originating,
                    'terminating' => $request->terminating,
                    'nama_layanan' => $request->nama_product,
                    'kapasitas' => $kapasitas,
                    'biaya_langganan' => $request->biaya_langganan,
                    'biaya_instalasi' => $request->biaya_instalasi,
                    'list_id' => $list_order_id,
                    'created_at' => Carbon::now(),
                ]);
                return redirect()->back();
            }
            public function delete_existing($id){
                $order = OrderLayanan::findOrFail($id);
                $order->delete();
                return redirect()->back();
            }
            public function delete_newexisting($id){
                $order = OrderLayanan::findOrFail($id);
                $order->delete();
                return redirect()->back();
            }

            public function store_data_order_existing(Request $request, $id)
            {
                $fb = FB::where('id', '=', $id)->first();
                $list_order_id =  Uuid::uuid4();
                if($request->session()->has('list_order_id')){
                    Session::get('list_order_id');
                }
                else{
                    $request->session()->put('list_order_id', $list_order_id);
                }
                
                $x = ListOrder::where('id', '=', Session::get('list_order_id'))->count();
                if ($x == 0) {
                    $list_order = ListOrder::insert([
                        'id' => Session::get('list_order_id'),
                        'fb_id' => $fb->id,	
                        'created_at' => Carbon::now(),
                    ]);
                    
                }
                $list_order_id = Session::get('list_order_id');
                OrderData::insert([
                    'list_id' => $list_order_id,
                    'user_login' => Auth::id(),
                    'tanggal_kesepakatan' => $request->tanggal_kesepakatan,
                    'tipe' => $request->tipe,
                    'nomor' => $request->nomor,
                    'nama_pj' => $request->nama_pj,
                    'jabatan_pj' => $request->jabatan_pj,
                    'no_pihak_pertama' => $request->no_pihak_pertama,
                    'no_pihak_kedua' => $request->no_pihak_kedua,
                    'jangka_berlangganan' => $request->jangka_berlangganan,
                    'status_biaya' => $request->status_biaya,
                    'status_tagihan' => $request->status_tagihan,
                    'catatan_penagihan' => $request->catatan_penagihan,
                    'tanggal_penagihan' => $request->tanggal_penagihan,
                    'status_publish' => $request->status_publish,
                    'created_at' => Carbon::now(),
                ]);
                return redirect()->back();
            }
    // Menu Sales Dashboard
        // --sales dashboard-- //
        public function sales_dashboard(){

            $sales = User::role('sales')->get();
            

            return view('admin.sales.index',compact('sales'));
        }
        public function datesalesfilter(Request $request){
            if($request->ajax()){

                $mm = $request->get('mm');
                $yy = $request->get('yy');
                $bulan = (string)$mm;
                $tahun = (string)$yy;
                if($mm != '' && $yy != ''){

                    $sales = User::role('sales')->get();
                    
                    foreach($sales as $s){
                        
                        $revenue[$s->id] = DB::table('users')
                        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                        ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                        ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                        ->whereMonth('list_orders.created_at', $bulan)
                        ->whereYear('list_orders.created_at', $tahun)
                        ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                        ->where([['model_has_roles.role_id',2],['fb.id_sales',$s->id]])
                        ->sum('layanan_orders.biaya_langganan');
        
                        $instalasi[$s->id] = DB::table('users')
                        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                        ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                        ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                        ->whereMonth('list_orders.created_at', $bulan)
                        ->whereYear('list_orders.created_at', $tahun)
                        ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                        ->where([['model_has_roles.role_id',2],['fb.id_sales',$s->id]])
                        ->sum('layanan_orders.biaya_instalasi');
        
                        $total[$s->id] = $revenue[$s->id] + $instalasi[$s->id];
                    }
                }else{
                    $sales = User::role('sales')->get();
                    
                    foreach($sales as $s){
                        
                        $revenue[$s->id] = DB::table('users')
                        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                        ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                        ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                        ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                        ->where([['model_has_roles.role_id',2],['fb.id_sales',$s->id]])
                        ->sum('layanan_orders.biaya_langganan');
        
                        $instalasi[$s->id] = DB::table('users')
                        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                        ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                        ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                        ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                        ->where([['model_has_roles.role_id',2],['fb.id_sales',$s->id]])
                        ->sum('layanan_orders.biaya_instalasi');
        
                        $total[$s->id] = $revenue[$s->id] + $instalasi[$s->id];
                    }
                }

                if($mm != '' && $yy != ''){
                    $json = array(
                        'bulan'  => $mm,
                        'tahun'  => $yy,
                        'revenue'  => $revenue,
                        'instalasi'  => $instalasi,
                        'total'  => $total
                    );
                }else{
                    $json = array(
                        'bulan'  => 0,
                        'tahun'  => '',
                        'revenue'  => $revenue,
                        'instalasi'  => $instalasi,
                        'total'  => $total
                    );
                }

                    echo json_encode($json);
            }
        }
    // Menu User
        // --Akun-- //
            public function user(){
                $user = User::role(['admin','sales'])->paginate(8);
                return view('admin.user.index',compact('user'));
            }
            public function user_store(Request $request){
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
                $user->assignRole($request->role);
                return redirect()->back();
            }
            public function user_edit(Request $request, $id){
                $user = User::where('id','=',$id)->first();
                return view('admin.user.edit')->with([
                    'user' => $user
                ]);
            }
            public function user_update(Request $request, $id){
                $user = User::where('id','=',$id)->first();
                $user->name =$request->name;
                $user->email =$request->email;
                $user->password =$request->password;
                if($request->has('password')){
                    $user['password'] = bcrypt($user['password']);
                }
                else{
                    $user = array_excep($user,['password']);
                }
                $user->syncRoles($request->role);
                $user->save();
                return redirect()->route('user');
            }
            public function user_delete( $id){
                $user = User::where('id','=',$id)->first();
                $user->delete();
                
                $fb = FB::where('user_id',$user->id)->first();
                $countfb = FB::where('user_id',$user->id)->count();
                if($countfb != 0){
                    $list_order = ListOrder::where('fb_id',$fb->id)->first();
                    $count_list = ListOrder::where('fb_id',$fb->id)->count();
                    if($count_list != 0){
                        $order_layanan = OrderLayanan::where('list_id',$list_order->id)->first();
                        $count_layanan = OrderLayanan::where('list_id',$list_order->id)->count();
                        if($count_layanan != 0){
                            $order_layanan->delete();
                        }

                        $order_data = OrderData::where('list_id',$list_order->id)->first();
                        $count_data = OrderData::where('list_id',$list_order->id)->count();
                        if($count_data != 0){
                            $order_data->delete();
                        }
                        $list_order->delete();
                    }
                    $fb->delete();
                }
                
                return redirect()->back();
            }

    // Menu User
        // --Data-- //
            public function data_icon_edit(Request $request){
                $data = DB::table('data_pihak_icons')->first();
                return view('admin.data_icons.edit')->with([
                    'data' => $data
                ]);
            }
            public function data_icon_update(Request $request){
                $data = DB::table('data_pihak_icons')->first();
                $data->nama_pj = $request->nama_pj;
                $data->jabatan_pj = $request->jabatan_pj;
                $data->alamat = $request->alamat;
                $data->no_telp = $request->no_telp;
                $data->no_fax = $request->no_fax;
                $data->save();
                return redirect()->route('data.icons');
            }
}       
