<?php

namespace App\Http\Controllers\Dashboard; 

use App\Http\Controllers\Controller;

use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class GenderController extends Controller
{ 
    public function index()
    {
        $records = Gender::get();
        $pageTitel = 'النوع';
        $route = 'gender';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/list', ['records' => $records, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 



    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $record = Gender::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);  
  
    }
 

 
    public function edit(Gender $gender)
    { 
        $record = $gender; 
        $route = 'gender';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/edit', ['record' => $record, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 


    public function update(Request $request, Gender $gender)
    { 
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $gender->update([
            'name' => $request->name,
            'code' => $request->code,
            ]); 
    }
 


    public function destroy(Gender $gender)
    {  
        $gender->delete();
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
