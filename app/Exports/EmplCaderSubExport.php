<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\BeforeExport; 
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class EmplCaderSubExport implements FromView, WithEvents, WithStyles, WithColumnWidths, WithDrawings
{
    
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/uploads/image/setting/logo.jpg'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B1');

        return $drawing;
    }

    public function columnWidths(): array
    {
        return [
            'B' => 40,   
            'C' => 15,   
            'D' => 25,   
            'E' => 35,   
            'F' => 15,   
            'G' => 25,   
            'H' => 15,   
            'I' => 15,   
            'J' => 15,  
            'K' => 15,  
            'L' => 15,            
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            8   => ['font' => ['size' => 16 , 'bold' => true]], 
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
        return view('exports.excel.empl_cader', [
            'employees' => Employee::whereHas('jobs_history', function($query) {
                $query->where('currently', 1)
                    ->where('cader_id', 1)
                    ->whereIn('nomination_type_id', ['1','5'])
                    ->whereIn('sub_group_id', ['22','23','24','25','26','27']);
             })->get()->sortByDesc(function($query){
                return $query->currently_job()->sub_group->functional_group->name;
             })
        ]);
    }
}
