<?php

namespace App\Traits;

use App\Models\Phone;
use App\Models\JobHistory;
use App\Models\ResidenceAddress;
use App\Models\EmployeeQualification;

 
trait EmployeeAddOtherDataTrait {
 
      
    public function addPhoneNumber($request , $id){

        foreach($request->cell as $cell){ 
            $record = Phone::create([
                'number'      => $cell,
                'employee_id' => $id,
                ]);   
        }   
    }

      
    public function addResidenceAddress($request , $id){
         
        $record = ResidenceAddress::create([
            'residence_address' => $request->residence_address,
            'residence_center'  => $request->residence_center,
            'residence_city'    => $request->residence_city,
            'employee_id'       => $id,
            ]);    
    }
      

    public function addQualification($request , $id){
         
        $record = EmployeeQualification::create([
            'qualification_source' => $request->qualification_source,
            'qualification_major'  => $request->qualification_major,
            'qualification_round'  => $request->qualification_round,
            'qualification_degree' => $request->qualification_degree,
            'qualification_date'   => $request->qualification_date,
            'qualification_id'     => $request->qualification_id,
            'employee_id'          => $id,
            ]);    
    }
      

    public function addJobHistory($request , $id){
         
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
            'employee_id'         => $id,
            'currently'           => 1,
            ]);    
    }


         

    public function addEmployeeData($request , $id){ 

        $this->addPhoneNumber($request, $id);
        $this->addResidenceAddress($request, $id);
        $this->addQualification($request, $id);
        $this->addJobHistory($request, $id);  

    }


 
    
    public function rules()
    {
        return  $rules = [  
            'first_name'            => 'required',
            'middle_name'           => 'required',
            'last_name'             => 'required',
            'family_name'           => 'required',
            'national_id'           => 'required',
            'birth_address'         => 'required',
            'birth_center'          => 'required',
            'birth_city'            => 'required',
            'birth_date'            => 'required',
            'join_date'             => 'required',
            'gender_id'             => 'required',
            'health_status_id'      => 'required',
            'social_status_id'      => 'required',
            'military_treatment_id' => 'required',
            'military_summons'      => 'required',
            ]; 
    }
    public function message()
    {
        return  $message = [ 
            'first_name.required'            => 'حقل الرقم مطلوب',
            'middle_name.required'           => 'حقل الرقم مطلوب',
            'last_name.required'             => 'حقل الرقم مطلوب',
            'family_name.required'           => 'حقل الرقم مطلوب',
            'national_id.required'           => 'حقل الرقم مطلوب',
            'birth_address.required'         => 'حقل الرقم مطلوب',
            'birth_center.required'          => 'حقل الرقم مطلوب',
            'birth_city.required'            => 'حقل الرقم مطلوب',
            'birth_date.required'            => 'حقل الرقم مطلوب',
            'join_date.required'             => 'حقل الرقم مطلوب',
            'gender_id.required'             => 'حقل الرقم مطلوب',
            'health_status_id.required'      => 'حقل الرقم مطلوب',
            'social_status_id.required'      => 'حقل الرقم مطلوب',
            'military_treatment_id.required' => 'حقل الرقم مطلوب',
            'military_summons.required'      => 'حقل الرقم مطلوب',
            ]; 
    }
 
}   