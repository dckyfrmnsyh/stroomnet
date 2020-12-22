<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use App\User;
use App\Models\ListOrder;
use App\Models\OrderLayanan;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BAKBBExport implements FromView,WithStyles,ShouldAutoSize
{
    use Exportable;
    
    public function view(): View
    {
        $bakbb = ListOrder::orderBy('created_at', 'DESC')->get();   
        $count_layanan =2;

        foreach($bakbb as $item){
            $layanan1[$item->id] = OrderLayanan::where([['list_id', $item->id],['tipe','exist']])->get();
            $layanan2[$item->id] = OrderLayanan::where([['list_id', $item->id],['tipe','new']])->get();
            $user = User::where('id',$item->order_data->user_login)->first();
            $nama_user[$item->id] = $user->name;
        }

        return view('admin.download.excel.bakbb', compact('layanan1','nama_user','layanan2','count_layanan','bakbb'));
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B2')->getFont()->setBold(true);
        return [
            1    => ['font' => ['bold' => true],['color' => 'white']],
        ];
    }
}
