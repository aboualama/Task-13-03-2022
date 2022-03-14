<?php

namespace App\Http\Controllers\Dashboard; 

use App\Models\JobStyle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobStyleController extends Controller
{ 
    public function index()
    {
        $records = JobStyle::get();
        $pageTitel = 'اسلوب شغل الوظيفة';
        $route = 'jobStyle';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/list', ['records' => $records, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 



    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $record = JobStyle::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);  
  
    } 
 

 
    public function edit(JobStyle $jobStyle)
    { 
        $record = $jobStyle; 
        $route = 'jobStyle';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/edit', ['record' => $record, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 


    public function update(Request $request, JobStyle $jobStyle)
    { 
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $jobStyle->update([
            'name' => $request->name,
            'code' => $request->code,
            ]); 
    }
 


    public function destroy(JobStyle $jobStyle)
    {  
        $jobStyle->delete();
    }

  
 
    public function rules()
    {
        return  $rules = [
            'name' => 'required|string',
            'code' => 'required', 
            ]; 
    }
    public function message()
    {
        return  $message = [
            'name.required' => 'حقل الاسم مطلوب',
            'name.string'   => 'حقل الاسم يجب ان يكون احرف',
            'code.required' => 'حقل الرقم الكودي مطلوب',
            ]; 
    }
 
}
