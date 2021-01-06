<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use App\User;
use App\Models\FB;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FBExport implements FromView,WithStyles,ShouldAutoSize
{
    use Exportable;

    private $from, $to;

    public function __construct(String $from, String $to) {

        $this->from = $from;
        $this->to = $to;
    }
    
    public function view(): View
    {
        $fb = FB::whereBetween('created_at', [$this->from, $this->to])->get();  

        foreach($fb as $item){
            $user = User::where('id',$item->user_login)->first();
            $nama_user[$item->id] = $user->name;
        }
        return view('admin.download.excel.fb', compact('nama_user','fb'));
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
