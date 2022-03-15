<?php

namespace App\Http\Controllers\Api; 

use App\Models\Post;
use App\Models\Category; 
use App\Http\Controllers\Controller; 

class CategoryController extends Controller
{ 
    public function get_categories()
    {
        $records = Category::get();  
        return response($records, 200);
    }  
 
    public function get_posts()
    {
        $records = Post::get();  
        return response($records, 200);
    }  
 
 
    public function show_post($id)
    {       
        $record = Post::find($id);
        $record->increment('views');
        return response($record, 200);
    }  
 
}
