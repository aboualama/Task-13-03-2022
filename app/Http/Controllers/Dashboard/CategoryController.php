<?php

namespace App\Http\Controllers\Dashboard; 

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{ 
    public function index()
    {
        $records = Category::get();
        $pageTitel = 'الاقسام';
        $route = 'category';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/categories/list', ['records' => $records, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 



    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $record = Category::create([
                'title' => $request->title,
                'description' => $request->description,
                'slug'        => Str::slug($request->title, '-'),
            ]);  
  
    }
 

 
    public function edit(Category $category)
    { 
        $record = $category; 
        $route = 'category';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/categories/edit', ['record' => $record, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }
 


    public function update(Request $request, Category $category)
    { 
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $category->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug'        => Str::slug($request->title, '-'),
            ]); 
    }
 


    public function destroy(Category $category)
    {  
        $category->delete();
    }

  
 
    public function rules()
    {
        return  $rules = [
            'title' => 'required|string',
            'description' => 'required', 
            ]; 
    }
    public function message()
    {
        return  $message = [
            'title.required' => 'حقل الاسم مطلوب',
            'title.string'   => 'حقل الاسم يجب ان يكون احرف',
            'description.required' => 'حقل الوصف  مطلوب',
            ]; 
    }
}
