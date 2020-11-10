<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use PDF;

class PDFController extends Controller
{
    public function newbakbb(Request $request, $id)
    {
        $customer = Customer::where('id',$id)->get();
        $pdf = PDF::loadview('admin.download.new_bakbb_pdf',['customer'=>$customer]);

        return $pdf->setPaper('A4')->stream('BAKBB LAYANAN BARU', array("Attachment"=>false));
    }
    public function oldbakbb(Request $request, $id)
    {
        $customer = Customer::where('id',$id)->get();
        $pdf = PDF::loadview('admin.download.old_bakbb_pdf',['customer'=>$customer]);

        return $pdf->setPaper('A4')->stream('BAKBB LAYANAN LAMA', array("Attachment"=>false));
    }
    public function fb(Request $request, $id)
    {
        $customer = Customer::where('id',$id)->get();
        $pdf = PDF::loadview('admin.download.fb_pdf',['customer'=>$customer]);

        return $pdf->setPaper('A4')->stream('FORMULIR BERLANGGAN', array("Attachment"=>false));
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
