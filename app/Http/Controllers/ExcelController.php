<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportExcel;
use App\Exports\FBExport;
use App\Exports\BAKBBExport;
use App\Exports\SalesDashboard;
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
}
