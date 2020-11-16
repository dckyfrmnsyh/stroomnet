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

class OrderController extends Controller
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
        $customer_id = Session::get('customer_id');
        $customer = DB::table('customers')->where('id', $customer_id)->first();

        $product = Product::pluck('nama', 'id');

        $order = DB::table('orders')->where('customer_id', $customer_id)->get();

        return view('users.new_order.create',['customer'=>$customer,'product'=>$product,'order'=>$order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_id = Session::get('customer_id');
        $customer = DB::table('customers')->where('id', $customer_id)->first();

        $request->session()->put('product', $customer_id);
        $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;


        Order::insert([
            'originating' => $request->originating,
            'terminating' => $request->terminating,
            'nama_product' => $request->nama_product,
            'kapasitas' => $kapasitas,
            'biaya_langganan' => $request->biaya_langganan,
            'biaya_instalasi' => $request->biaya_instalasi,
            'customer_id' => $customer_id,
        ]);
        return redirect()->route('order.create');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function old_create()
    {
        $customer_id = Session::get('customer_id');
        $customer = DB::table('customers')->where('id', $customer_id)->first();

        $product = Product::pluck('nama', 'id');

        $order = DB::table('orders')->where('customer_id', $customer_id)->get();
        $old_order = DB::table('old_orders')->where('customer_id', $customer_id)->get();

        return view('users.old_order.create',['customer'=>$customer,'product'=>$product,'old_order'=>$old_order,'order'=>$order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function old_store(Request $request)
    {
        $customer_id = Session::get('customer_id');
        $customer = DB::table('customers')->where('id', $customer_id)->first();

        $request->session()->put('product', $customer_id);
        $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;
        Order::insert([
            'originating' => $request->originating,
            'terminating' => $request->terminating,
            'nama_product' => $request->nama_product,
            'kapasitas' => $kapasitas,
            'biaya_langganan' => $request->biaya_langganan,
            'biaya_instalasi' => $request->biaya_instalasi,
            'customer_id' => $customer_id,
        ]);
        return redirect()->route('order.old_create');
    }
    public function old_store_2(Request $request)
    {
        $customer_id = Session::get('customer_id');
        $customer = DB::table('customers')->where('id', $customer_id)->first();

        $request->session()->put('product', $customer_id);
        $kapasitas = $request->kapasitas ." ". $request->satuan_kapasitas;

        Oldorder::insert([
            'originating' => $request->originating,
            'terminating' => $request->terminating,
            'nama_product' => $request->nama_product,
            'kapasitas' => $kapasitas,
            'biaya_langganan' => $request->biaya_langganan,
            'biaya_instalasi' => $request->biaya_instalasi,
            'customer_id' => $customer_id,
        ]);
        return redirect()->route('order.old_create');
    }
    
    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order.create');
    }
    public function old_delete($id)
    {
        $order = Oldorder::findOrFail($id);
        $order->delete();
        return redirect()->route('order.old_create');
    }
    public function newold_delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order.old_create');
    }

    public function addpenagihan(Request $request){
        $customer_id = Session::get('customer_id');
        $customer = Customer::where('id',$customer_id)->first();
        $customer->tgl_penagihan = $request->tgl_penagihan;
        $customer->save();
        return redirect()->back();
    }

}
