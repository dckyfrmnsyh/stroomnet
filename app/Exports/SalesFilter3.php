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

class SalesFilter3 implements FromView,WithStyles,ShouldAutoSize
{
    use Exportable;

    public function __construct( int $tahun) {

        $this->tahun = $tahun;
    }
    
    public function view(): View
    {
        $tahun = (string)$this->tahun;
        if($tahun != 0){

            $sales = User::role('sales')->get();
            
            foreach($sales as $s){
                
                $revenue[$s->id] = DB::table('users')
                ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                ->whereYear('list_orders.created_at', $tahun)
                ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                ->where([['model_has_roles.role_id',2],['fb.id_sales',$s->id]])
                ->sum('layanan_orders.biaya_langganan');

                $instalasi[$s->id] = DB::table('users')
                ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('fb', 'users.id', '=', 'fb.id_sales')
                ->leftJoin('list_orders', 'fb.id', '=', 'list_orders.fb_id')
                ->whereYear('list_orders.created_at', $tahun)
                ->leftJoin('layanan_orders', 'list_orders.id', '=', 'layanan_orders.list_id')
                ->where([['model_has_roles.role_id',2],['fb.id_sales',$s->id]])
                ->sum('layanan_orders.biaya_instalasi');

                $total[$s->id] = $revenue[$s->id] + $instalasi[$s->id];

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

                $tahun = 'All years';
            }
        }

        return view('admin.download.excel.sales_filter3', compact('tahun','revenue','instalasi','total','sales'));
    }
    public function styles(Worksheet $sheet)
    {
        
        return [
            1    => ['font' => ['bold' => true],['color' => 'white']],
        ];
    }
}
