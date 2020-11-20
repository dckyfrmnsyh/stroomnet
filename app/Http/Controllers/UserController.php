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
        return view('users.index');
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
    public function delete($id)
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
