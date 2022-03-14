<?php

namespace App\Http\Controllers\Dashboard; 

use App\Models\FinancialDegree;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FinancialDegreeController extends Controller
{ 
    public function index()
    {
        $records = FinancialDegree::get();
        $pageTitel = 'الدرجات الوظيفية';
        $route = 'financialDegree';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/list', ['records' => $records, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 



    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $record = FinancialDegree::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);  
  
    } 
 

 
    public function edit(FinancialDegree $financialDegree)
    { 
        $record = $financialDegree; 
        $route = 'financialDegree';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/edit', ['record' => $record, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 


    public function update(Request $request, FinancialDegree $financialDegree)
    { 
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $financialDegree->update([
            'name' => $request->name,
            'code' => $request->code,
            ]); 
    }
 


    public function destroy(FinancialDegree $financialDegree)
    {  
        $financialDegree->delete();
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
