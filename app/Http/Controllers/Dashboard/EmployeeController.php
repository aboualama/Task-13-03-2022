<?php

namespace App\Http\Controllers\Dashboard; 
  
use App\Models\Employee; 
use App\Models\SubGroup; 
use App\Models\JobHistory;
use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;
use App\Models\EmployeeQualification;
use App\Traits\EmployeeAddOtherDataTrait;
use Illuminate\Support\Facades\Validator;
use App\Traits\EmployeeEditOtherDataTrait;

class EmployeeController extends Controller
{
    use EmployeeAddOtherDataTrait, EmployeeEditOtherDataTrait;

    public function index()
    {  
        $pageConfigs       = ['pageHeader' => false];
        return view('/app/employees/app_employees', ['pageConfigs' => $pageConfigs]); 
    }
  
 
    public function store(Request $request)
    {  
        
        $record = Employee::create([
            'first_name'            => $request->first_name,
            'middle_name'           => $request->middle_name,
            'last_name'             => $request->last_name,
            'family_name'           => $request->family_name,
            'national_id'           => $request->national_id,
            'birth_address'         => $request->birth_address,
            'birth_center'          => $request->birth_center,
            'birth_city'            => $request->birth_city,
            'birth_date'            => $request->birth_date,
            'join_date'             => $request->join_date,
            'gender_id'             => ($request->gender == 'ذكر') ? 1 : 2,
            'health_status_id'      => $request->health_status_id,
            'social_status_id'      => $request->social_status_id,
            'military_treatment_id' => $request->military_treatment_id,
            'military_summons'      => $request->military_summons,
        ]);  
            
        $this->addEmployeeData($request, $record->id); 
    }
    
 
    public function show(Employee $employee)
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/app/employees/app-employee-view', ['pageConfigs' => $pageConfigs, 'employee' => $employee]);
    }
 
    
 
    public function update(Request $request, Employee $employee)
    { 

        $employee->update([
            'first_name'            => $request->first_name,
            'middle_name'           => $request->middle_name,
            'last_name'             => $request->last_name,
            'family_name'           => $request->family_name,
            'national_id'           => $request->national_id,
            'birth_address'         => $request->birth_address,
            'birth_city'            => $request->birth_city,
            'birth_date'            => $request->birth_date,
            'join_date'             => $request->join_date,
            'gender_id'             => ($request->gender == 'ذكر') ? 1 : 2,
            'health_status_id'      => $request->health_status_id,
            'social_status_id'      => $request->social_status_id,
            'military_treatment_id' => $request->military_treatment_id,
            'military_summons'      => $request->military_summons,
        ]);
        
        $this->editEmployeeData($request, $employee->id); 
    }
 

    public function destroy(Employee $employee)
    { 
        $employee->delete();
    }

    public function getemployees()
    {
        $data['data'] = Employee::get()->load('phones'); 
        return $data ;
    }

    public function get_sub_group(Request $request)
    {
        $sub_group = SubGroup::where('functional_group_id', $request->id)->get(); 
        return $sub_group;
    }














    public function new_qualification(Request $request)
    {   
        $record = EmployeeQualification::create([
            'qualification_source' => $request->qualification_source,
            'qualification_major'  => $request->qualification_major,
            'qualification_round'  => $request->qualification_round,
            'qualification_degree' => $request->qualification_degree,
            'qualification_date'   => $request->qualification_date,
            'qualification_id'     => $request->qualification_id,
            'employee_id'          => $request->id,
            ]); 
    }

    public function new_job(Request $request)
    {   
        JobHistory::where('employee_id' , $request->id)->where('currently', 1)->update(['currently' => 0]);
        $record = JobHistory::create([
            'job_function_name'   => $request->job_function_name,
            'sub_group_id'        => $request->sub_group_id,
            'join_date'           => $request->join_date,
            'financial_degree_id' => $request->financial_degree_id, 
            'degree_date'         => $request->degree_date,  
            'job_style_id'        => $request->job_style_id,
            'cader_id'            => $request->cader_id,
            'job_status_id'       => $request->job_status_id,
            'nomination_type_id'  => $request->nomination_type_id,
            'employee_id'         => $request->id,
            'currently'           => 1,
            ]);  
    }
    
    
    
}
