<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use App\User;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportExcel implements FromView,WithStyles,ShouldAutoSize
{
    use Exportable;
    
    public function view(): View
    {
        return view('admin.download.excel.exportuser', [
            'users' => User::all()
        ]);
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true],['color' => 'white']],
        ];
    }
}
