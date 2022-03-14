<?php

namespace App\Http\Controllers\Api; 

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{ 
    public function getall()
    {
        $records = Category::get();  
        return response($records, 200);
    }  
 
 
}
