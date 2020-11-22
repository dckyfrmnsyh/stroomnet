<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Customer;
use PDF;
use App\Models\Order;
use App\Models\Oldorder;

use DB;


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
        $order = DB::table('orders')->count();
        $oldorder = DB::table('old_orders')->count();
        $total_order = $order+$oldorder;
        $total_client = DB::table('customers')->count();
        $total_client_new = DB::table('customers')->where('tipe','=','new')->count();
        $total_client_upgrade = DB::table('customers')->where('tipe','=','upgrade')->count();
        $total_client_downgrade = DB::table('customers')->where('tipe','=','downgrade')->count();
        $total_client_relokasi = DB::table('customers')->where('tipe','=','relokasi')->count();
        $tabel = Customer::orderBy('tgl_hari_ini', 'DESC')->paginate(10);

        $allOrder = Order::all();
        $allOldorder = Oldorder::all();
        return view('admin.index',compact('tabel','total_client','total_client_new',
        'total_client_upgrade','total_client_downgrade','total_client_relokasi',
        'total_order','allOrder','allOldorder'));
    }
    public function order()
    {
        $countnew = DB::table('customers')->where('tipe','=','new')->count();
        $countup = DB::table('customers')->where('tipe','=','upgrade')->count();
        $countdown = DB::table('customers')->where('tipe','=','downgrade')->count();
        $countre = DB::table('customers')->where('tipe','=','relokasi')->count();
        $countper = DB::table('customers')->where('tipe','=','perpanjangan')->count();
        $countoldnew = DB::table('customers')->where('tipe','=','layanan_baru')->count();
        return view('admin.pages.order',compact('countnew','countup','countdown','countre','countper','countoldnew'));
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

}       
