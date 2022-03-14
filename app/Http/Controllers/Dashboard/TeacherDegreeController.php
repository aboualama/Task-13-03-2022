<?php

namespace App\Http\Controllers\Dashboard; 

use App\Models\TeacherDegree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TeacherDegreeController extends Controller
{ 
    public function index()
    {
        $records = TeacherDegree::get();
        $pageTitel = 'درجات اعضاء هيئة التدريس';
        $route = 'teacherDegree';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/list', ['records' => $records, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 



    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $record = TeacherDegree::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);  
  
    }
 

 
    public function edit(TeacherDegree $teacherDegree)
    { 
        $record = $teacherDegree; 
        $route = 'teacherDegree';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/edit', ['record' => $record, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 


    public function update(Request $request, TeacherDegree $teacherDegree)
    { 
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $teacherDegree->update([
            'name' => $request->name,
            'code' => $request->code,
            ]); 
    }
 


    public function destroy(TeacherDegree $teacherDegree)
    {  
        $teacherDegree->delete();
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
