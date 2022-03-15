<?php

namespace App\Http\Controllers\Api; 

use App\Models\Post;
use App\Models\Category; 
use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;

class CategoryController extends Controller
{ 
    public function get_categories()
    {
        $records = Category::get();  
        return response($records, 200);
    }  
  
 
    public function show_post($id)
    {       
        $record = Post::find($id);
        $record->increment('views');
        return response($record, 200);
    }  
 

    public function get_posts(Request $request)
    { 
        $record = Post::where(function($query) use($request)
            {
                if($request->has('category_id'))
                {
                    $query->where('category_id' , $request->category_id);
                } 

            })->get();

        if($record->count() == 0)
        {
            return response(['Status' => '204', 'Message' => 'لا يوجد مقالات','Data'=>[]]);
        }
        return response(['Status' => '200', 'Message' => 'تم اظهار جميع المقالات بنجاح', 'Data' => $record, 'filters'=> $request->all()]);
    }



}
