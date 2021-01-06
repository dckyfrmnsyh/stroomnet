<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use App\User;
use App\Models\ListOrder;
use App\Models\OrderData;
use App\Models\OrderLayanan;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BAKBBExport implements FromView,WithStyles,ShouldAutoSize
{
    use Exportable;

    public function __construct(String $from, String $to) {

        $this->from = $from;
        $this->to = $to;
    }
    
    public function view(): View
    {
        $bakbb = OrderData::whereBetween('tanggal_kesepakatan', [$this->from, $this->to])->get(); 
        $count_layanan =2;

        foreach($bakbb as $item){
            $layanan1[$item->list_id] = OrderLayanan::where([['list_id', $item->list_id],['tipe','exist']])->get();
            $layanan2[$item->list_id] = OrderLayanan::where([['list_id', $item->list_id],['tipe','new']])->get();
            $user = User::where('id',$item->user_login)->first();
            $nama_user[$item->list_id] = $user->name;
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
