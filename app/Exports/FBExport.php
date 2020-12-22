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
    
    public function view(): View
    {
        $fb = FB::all();   

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
