<?php

namespace App\Http\Controllers\Dashboard; 

use App\Models\SubGroup;
use Illuminate\Http\Request;
use App\Models\FunctionalGroup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubGroupController extends Controller
{  
    public function index()
    {
        $records = SubGroup::get();
        $groups = FunctionalGroup::get();
        $pageTitel = 'المجموعات النوعية';
        $route = 'subGroup';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/list', ['records' => $records, 'groups' => $groups, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 



    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $record = SubGroup::create([
                'name'                => $request->name,
                'code'                => $request->code,
                'functional_group_id' => $request->functional_group_id
            ]);  
  
    }
 

 
    public function edit(SubGroup $subGroup)
    { 
        $record = $subGroup; 
        $groups = FunctionalGroup::get();
        $route = 'subGroup';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/edit', ['record' => $record, 'groups' => $groups, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 


    public function update(Request $request, SubGroup $subGroup)
    { 
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $subGroup->update([
            'name'                => $request->name,
            'code'                => $request->code,
            'functional_group_id' => $request->functional_group_id
            ]); 
    }
 


    public function destroy(SubGroup $subGroup)
    {  
        $subGroup->delete();
    }

  
 
    public function rules()
    {
        return  $rules = [
            'name'                => 'required|string',
            'code'                => 'required',
            'functional_group_id' => 'required'
            ]; 
    }
    public function message()
    {
        return  $message = [
            'name.required'                => 'حقل الاسم مطلوب',
            'name.string'                  => 'حقل الاسم يجب ان يكون احرف',
            'code.required'                => 'حقل الرقم الكودي مطلوب',
            'functional_group_id.required' => 'يجب اختيار مجموعه وظيفية',
            ]; 
    }
}
