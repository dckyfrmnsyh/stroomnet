<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\FB;
use App\Models\ListOrder;
use App\Models\OrderLayanan;
use PDF;
use Auth;

class PDFController extends Controller
{
    public function bakbb(Request $request, $id)
    {
        $data = FB::where('id',$id)->get();
        $list_order = ListOrder::where('id',$id)->first();
        $fb = FB::where('id',$list_order->fb_id)->first();
        $count1 = OrderLayanan::where([['list_id',$id],['tipe','new']])->count();
        $count2 = OrderLayanan::where([['list_id',$id],['tipe','exist']])->count();
        $new = OrderLayanan::where([['list_id',$id],['tipe','new']])->get();
        $exist = OrderLayanan::where([['list_id',$id],['tipe','exist']])->get();
        foreach($list_order->order_layanan as $layanan){
            
        }
        $pdf = PDF::loadview('admin.download.bakbb',compact('list_order','fb','count1','count2','new','exist'));

        return $pdf->setPaper('A4')->stream('BAKBB.pdf', array("Attachment"=>false));
    }
    public function showbakbb(Request $request, $id)
    {
        $data = FB::where('id',$id)->get();
        $list_order = ListOrder::where('id',$id)->first();
        $fb = FB::where('id',$list_order->fb_id)->first();
        $count1 = OrderLayanan::where([['list_id',$id],['tipe','new']])->count();
        $count2 = OrderLayanan::where([['list_id',$id],['tipe','exist']])->count();
        $new = OrderLayanan::where([['list_id',$id],['tipe','new']])->get();
        $exist = OrderLayanan::where([['list_id',$id],['tipe','exist']])->get();
        foreach($list_order->order_layanan as $layanan){
            
        }
        return view('admin.order.showbakbb',compact('list_order','fb','count1','count2','new','exist'));
    }
    public function show_bakbb(Request $request, $id)
    {
        $data = FB::where('id',$id)->get();
        $list_order = ListOrder::where('id',$id)->first();
        $fb = FB::where('id',$list_order->fb_id)->first();
        $count1 = OrderLayanan::where([['list_id',$id],['tipe','new']])->count();
        $count2 = OrderLayanan::where([['list_id',$id],['tipe','exist']])->count();
        $new = OrderLayanan::where([['list_id',$id],['tipe','new']])->get();
        $exist = OrderLayanan::where([['list_id',$id],['tipe','exist']])->get();
        foreach($list_order->order_layanan as $layanan){
            
        }
        return view('users.BAKBB.show',compact('list_order','fb','count1','count2','new','exist'));
    }

    public function newbakbb(Request $request, $id)
    {
        $customer = Customer::where('id',$id)->get();
        $pdf = PDF::loadview('admin.download.new_bakbb_pdf',['customer'=>$customer]);

        return $pdf->setPaper('A4')->stream('BAKBB LAYANAN BARU.pdf', array("Attachment"=>false));
    }
    public function oldbakbb(Request $request, $id)
    {
        $customer = Customer::where('id',$id)->get();
        $pdf = PDF::loadview('admin.download.old_bakbb_pdf',['customer'=>$customer]);

        return $pdf->setPaper('A4')->stream('BAKBB LAYANAN LAMA.pdf', array("Attachment"=>false));
    }
    public function fb(Request $request, $id)
    {
        $user = FB::where('user_id',$id)->get();
        $pdf = PDF::loadview('admin.download.fb_pdf',['customer'=>$user]);

        return $pdf->setPaper('A4')->stream('FORMULIR BERLANGGAN.pdf', array("Attachment"=>false));
    }
    public function fb_user(Request $request)
    {
        $user = FB::where('user_id',Auth::id())->get();
        $pdf = PDF::loadview('admin.download.fb_pdf',['customer'=>$user]);

        return $pdf->setPaper('A4')->stream('FORMULIR BERLANGGAN.pdf', array("Attachment"=>false));
    }

    public function show($id){
        $customer = Customer::where('id',$id)->get();
        return view('admin.show.show',compact('customer'));
    }
    public function show_old($id){
        $customer = Customer::where('id',$id)->get();
        return view('admin.show.show_old',compact('customer'));
    }


}
