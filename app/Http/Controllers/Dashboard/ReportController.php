<?php

namespace App\Http\Controllers\Dashboard; 
 
use PDF;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmplCaderExport;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller; 

class ReportController extends Controller
{  
    public function index()
    {
        $records['employee'] = Employee::get();
        $pageTitel = 'المطبوعات'; 
        $pageConfigs = ['pageHeader' => false];
        return view('/exports.reports', ['records' => $records, 'pageTitel' => $pageTitel, 'pageConfigs' => $pageConfigs]); 
    }
 

    public function export_employees_sheet() 
    { 
        return Excel::download(new EmployeesExport(), 'EmployeesExports.xlsx');
    }

    public function export_empl_cader_sheet() 
    { 
        return Excel::download(new EmplCaderExport(), 'EmplCaderExports.xlsx');
    }

    public function export_empl_cader_sub_sheet() 
    { 
        return Excel::download(new EmplCaderSubExport(), 'EmplCaderSubExport.xlsx');
    }
    
    
    public function employee_receipt_work($id)
    {       
        $employee = Employee::find($id);  
        $pdf =  PDF::loadView('exports.pdf.receipt_work', ['employee' => $employee]); 
        return $pdf->stream('employee.pdf');      
    } 
 
}
