<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\BeforeExport; 
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmployeesExport implements FromView, WithEvents, WithStyles, WithColumnWidths
{
    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 45,            
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['size' => 16]], 
        ];
    }
    
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }


    public function view(): View
    {
        return view('exports.excel.employees', [
            'employee' => Employee::get() 
        ]);
    }
}
