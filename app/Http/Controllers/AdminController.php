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
    public function index()
    {
        $order = DB::table('data_orders')->count();
        $oldorder = DB::table('data_orders')->count();
        $total_order = $order+$oldorder;
        $total_client = DB::table('fb')->count();
        $total_client_new = DB::table('data_orders')->where('tipe','=','new')->count();
        $total_client_upgrade = DB::table('data_orders')->where('tipe','=','upgrade')->count();
        $total_client_downgrade = DB::table('data_orders')->where('tipe','=','downgrade')->count();
        $total_client_relokasi = DB::table('data_orders')->where('tipe','=','relokasi')->count();
        $total_client_per = DB::table('data_orders')->where('tipe','=','perpanjangan')->count();
        $total_client_oldnew = DB::table('data_orders')->where('tipe','=','layanan_baru')->count();

        $tabel = FB::orderBy('id', 'DESC')->paginate(10);

        $allOrder = Order::all();
        $allOldorder = Oldorder::all();
        return view('admin.dashboard.index',compact('tabel','total_client','total_client_new',
        'total_client_upgrade','total_client_downgrade','total_client_relokasi','total_client_per','total_client_oldnew',
        'total_order','allOrder','allOldorder'));
    }
    public function order_2()
    {
        $countnew = DB::table('customers')->where('tipe','=','new')->count();
        $countup = DB::table('customers')->where('tipe','=','upgrade')->count();
        $countdown = DB::table('customers')->where('tipe','=','downgrade')->count();
        $countre = DB::table('customers')->where('tipe','=','relokasi')->count();
        $countper = DB::table('customers')->where('tipe','=','perpanjangan')->count();
        $countoldnew = DB::table('customers')->where('tipe','=','layanan_baru')->count();
        $tabel = Customer::orderBy('tgl_hari_ini', 'DESC')->paginate(15);
        return view('admin.pages.order',compact('tabel','countnew','countup','countdown','countre','countper','countoldnew'));
    }
    public function order1()
    {
        $orderlist = Customer::where('tipe','=','new')->orderBy('tgl_hari_ini', 'DESC')->paginate(15);
        return view('admin.pages.order1',compact('orderlist'));
    }
    public function order2()
    {
        $upgradelist = Customer::where('tipe','=','upgrade')->orderBy('tgl_hari_ini', 'DESC')->paginate(15);
        return view('admin.pages.order2',compact('upgradelist'));
    }
    public function order3()
    {
        $downgradelist = Customer::where('tipe','=','downgrade')->orderBy('tgl_hari_ini', 'DESC')->paginate(15);
        return view('admin.pages.order3',compact('downgradelist'));
    }
    public function order4()
    {
        $relokasilist = Customer::where('tipe','=','relokasi')->orderBy('tgl_hari_ini', 'DESC')->paginate(15);
        return view('admin.pages.order4',compact('relokasilist'));
    }
    public function order5()
    {
        $perpanjanganlist = Customer::where('tipe','=','perpanjangan')->orderBy('tgl_hari_ini', 'DESC')->paginate(15);
        return view('admin.pages.order5',compact('perpanjanganlist'));
    }
    public function order6()
    {
        $layanan_barulist = Customer::where('tipe','=','layanan_baru')->orderBy('tgl_hari_ini', 'DESC')->paginate(15);
        return view('admin.pages.order6',compact('layanan_barulist'));
    }
    public function delete_order($id)
    {
        $customer = Customer::findOrFail($id);
        $order = Order::where('customer_id','=',$id);
        $oldorder = Oldorder::where('customer_id','=',$id);
        $order->delete();
        $oldorder->delete();
        $customer->delete();
        return redirect()->back();
    }

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
                return view('admin.customer.createfb',compact('customer','provinces'));
            }
            public function storefb(Request $request, $id){
                $provinsi = Province::where('id',$request->provinsi)->first();
                $kota = City::where('id',$request->kota)->first();
                $kecamatan = District::where('id',$request->kecamatan)->first();
                $desa = Village::where('id',$request->desa)->first();

                $customer = FB::insert([
                    'user_id' => $id,
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

                return redirect()->route('customer');
            }

            public function showfb(Request $request, $id){
                $customer = User::find($id);
                $data = FB::where('user_id','=',$customer->id)->first();
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

                return view('admin.customer.showfb',compact('fb','icons','data','customer','provinces','desa','kecamatan','kota','provinsi'));
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
            public function order(Request $request){
                $data = FB::where('user_login', '=', Auth::id())->orderBy('created_at', 'DESC')->paginate(10);   

                foreach($data as $item){
                    $user = User::where('id',$item->user_login)->first();
                    $nama_user[$item->id] = $user->name;
                }
                $request->session()->forget('list_order_id');
                return view('admin.order.index',compact('data','nama_user'));
            }
            public function view_order_all(Request $request){
                $data = FB::orderBy('created_at', 'DESC')->paginate(20);   

                foreach($data as $item){
                    $user = User::where('id',$item->user_login)->first();
                    $nama_user[$item->id] = $user->name;
                }
                $request->session()->forget('list_order_id');
                return view('admin.order.viewall',compact('data','nama_user'));
            }
            public function edit_list_order(Request $request,$id)
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
                return view('admin.order.edit',compact('layanan1','cek_data_od','layanan2','order_data','cek_data1','cek_data2','cek_order_data','fb','data','nama_user','count'));
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
                $order_data = OrderData::where('list_id', '=', $list_id)->get();
                
                $layanan = OrderLayanan::where([['list_id', $list_id],['tipe','new']])->get();

                $count = OrderData::where('list_id', '=', $list_id)->count();
                if($count >= 1){
                    $cek_order_data = 1;
                }
                elseif($count == 0){
                    $cek_order_data = 0;
                }
                return view('admin.order.new',compact('fb','layanan','test','list_id','order_data','cek_order_data'));
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
                return view('admin.order.existing',compact('fb','layanan1','layanan2','test','list_id','order_data','cek_order_data'));
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
    // Menu User
        // --Akun-- //
            public function user(){
                $user = User::role(['admin','sales'])->get();
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
