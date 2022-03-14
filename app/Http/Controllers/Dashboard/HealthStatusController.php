<?php


namespace App\Http\Controllers\Dashboard; 

use App\Http\Controllers\Controller;

use App\Models\HealthStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HealthStatusController extends Controller 
{ 
    public function index()
    {
        $records = HealthStatus::get();
        $pageTitel = 'الحالة الصحية';
        $route = 'healthStatus';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/list', ['records' => $records, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 



    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $record = HealthStatus::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);  
  
    } 
 

 
    public function edit(HealthStatus $healthStatus)
    { 
        $record = $healthStatus; 
        $route = 'healthStatus';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/tables/edit', ['record' => $record, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 


    public function update(Request $request, HealthStatus $healthStatus)
    { 
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $healthStatus->update([
            'name' => $request->name,
            'code' => $request->code,
            ]); 
    }
 


    public function destroy(HealthStatus $healthStatus)
    {  
        $healthStatus->delete();
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
