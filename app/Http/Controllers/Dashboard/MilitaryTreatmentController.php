<?php

namespace App\Http\Controllers\Dashboard; 

use Illuminate\Http\Request;

use App\Models\MilitaryTreatment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MilitaryTreatmentController extends Controller
{ 
    public function index()
    {
        $records = MilitaryTreatment::get();
        $pageTitel = 'المعاملة العسكرية';
        $route = 'militaryTreatment';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/list', ['records' => $records, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 



    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $record = MilitaryTreatment::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);  
  
    } 
 

 
    public function edit(MilitaryTreatment $militaryTreatment)
    { 
        $record = $militaryTreatment; 
        $route = 'militaryTreatment';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/edit', ['record' => $record, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 


    public function update(Request $request, MilitaryTreatment $militaryTreatment)
    { 
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $militaryTreatment->update([
            'name' => $request->name,
            'code' => $request->code,
            ]); 
    }
 


    public function destroy(MilitaryTreatment $militaryTreatment)
    {  
        $militaryTreatment->delete();
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
