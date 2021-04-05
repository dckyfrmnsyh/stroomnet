<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportExcel;
use App\Exports\FBExport;
use App\Exports\BAKBBExport;
use App\Exports\SalesDashboard;
use App\Exports\SalesFilter2;
use App\Exports\SalesFilter3;
use Maatwebsite\Excel\Facades\Excel;

use Carbon;

class ExcelController extends Controller
{
    //
    public function user(Request $request){
        return (new ExportExcel)->download('users.xlsx');
    }
    public function fb(Request $request){
        $from = Carbon::parse($request->get('from'));
        $to = Carbon::parse($request->get('to'));
        return Excel::download(new FBExport($from, $to), 'fb.xlsx');
    }
    public function bakbb(Request $request){
        $from = Carbon::parse($request->get('from'));
        $to = Carbon::parse($request->get('to'));
        return (new BAKBBExport($from, $to))->download('BAKBB.xlsx');
    }
    public function sales_dashboard(Request $request){
        $bulan = $request->get('month1');
        $tahun = $request->get('year');
        return (new SalesDashboard($bulan, $tahun))->download('Sales.xlsx');
    }
    public function sales_filter2(Request $request){
        $bulan1 = $request->get('date1');
        $bulan2 = $request->get('date2');
        return (new SalesFilter2($bulan1, $bulan2))->download('Sales.xlsx');
    }
    public function sales_filter3(Request $request){
        $tahun = $request->get('year01');
        return (new SalesFilter3($tahun))->download('Sales.xlsx');
    }
}
