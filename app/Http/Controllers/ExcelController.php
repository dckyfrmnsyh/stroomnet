<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportExcel;
use App\Exports\FBExport;
use App\Exports\BAKBBExport;

class ExcelController extends Controller
{
    //
    public function user(){
        return (new ExportExcel)->download('users.xlsx');
    }
    public function fb(){
        return (new FBExport)->download('FB.xlsx');
    }
    public function bakbb(){
        return (new BAKBBExport)->download('BAKBB.xlsx');
    }
}
