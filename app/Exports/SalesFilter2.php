<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use App\User;
use App\Models\ListOrder;
use App\Models\OrderData;
use App\Models\OrderLayanan;
use App\Models\FB;
use DB;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SalesFilter2 implements FromView,WithStyles,ShouldAutoSize
{
    use Exportable;

    public function __construct(String $bulan1, String $bulan2) {

        $this->bulan1 = $bulan1;
        $this->bulan2 = $bulan2;
    }
    
    public function view(): View
    {
        $bulan1 = (string)$this->bulan1;
        $bulan2 = (string)$this->bulan2;
        if($bulan1 != '' && $bulan2 != ''){

            $sales = User::role('sales')->get();
            
            foreach($sales as $s){
                
                $revenue[$s->id] = DB::table('users')
                ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                ->whereBetween('list_orders.created_at', [$bulan1,$bulan2])
                ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                ->where([['model_has_roles.role_id',2],['fb.id_sales',$s->id]])
                ->sum('layanan_orders.biaya_langganan');

                $instalasi[$s->id] = DB::table('users')
                ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                ->whereBetween('list_orders.created_at', [$bulan1,$bulan2])
                ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                ->where([['model_has_roles.role_id',2],['fb.id_sales',$s->id]])
                ->sum('layanan_orders.biaya_instalasi');

                $total[$s->id] = $revenue[$s->id] + $instalasi[$s->id];

                $bulan1 = $this->bulan1;
                $bulan2 = $this->bulan2;
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

                $bulan1 = 0;
                $bulan2 = 0;
            }
        }

        return view('admin.download.excel.sales_filter2', compact('bulan1','bulan2','revenue','instalasi','total','sales'));
    }
    public function styles(Worksheet $sheet)
    {
       
        return [
            1    => ['font' => ['bold' => true],['color' => 'white']],
        ];
    }
}
