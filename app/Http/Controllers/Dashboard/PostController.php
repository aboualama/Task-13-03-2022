<?php

namespace App\Http\Controllers\Dashboard;   

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    {
        $records = Post::get()->load('category');
        $pageTitel = 'المقالات';
        $route = 'post';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/blog/blog-list', ['records' => $records, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }

 
    public function create()
    {
        $records = Category::get(); 
        $pageTitel = 'أضافة مقال';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/blog/blog-add', ['records' => $records, 'pageConfigs' => $pageConfigs, 'pageTitel' => $pageTitel]); 
    }

 
    public function store(Request $request)
    {  
        $validator = Validator::make($request->all(), $this->rules(), $this->message()); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 442]);
        }
        $record = Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'slug'        => Str::slug($request->title, '-'),
                'status' => $request->status,
                'category_id' => $request->category_id,
                'views' => 0,
            ]);  
        if (request()->hasFile('image'))
        {
            $image =  $request->file('image');
            $public_path = 'uploads/image/post';
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($public_path , $image_name);
        }else
        {
            $image_name = "default.jpg";
        }
        $record['image'] = $image_name; 
        $record->save();
    }

 
    public function show(Post $post)
    {       
        $post->increment('views');
        $pageConfigs = ['pageHeader' => false];
        return view('/app/blog/blog-detail', ['record' => $post, 'pageConfigs' => $pageConfigs]); 
    }

 
    public function edit(Post $post)
    {
        $record = $post;  
        $categories = Category::get();
        $pageTitel = 'تعديل مقال';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/blog/blog-edit', ['record' => $record, 'categories' => $categories, 'pageConfigs' => $pageConfigs, 'pageTitel' => $pageTitel]); 
    }

 
    public function update(Request $request, Post $post)
    {   
        $post->update($request->all());
        if (request()->hasFile('image'))
        {
            $image =  $request->file('image');
            $public_path = 'uploads/image/post';
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($public_path , $image_name);
        }else
        {
            $image_name = $post->image;
        } 
        $post['image'] = $image_name; 
        $post->save();    
    }

 
    public function destroy(Post $post)
    {
        $post->delete();
    }



    public function search(Request $request)
    {
        $search = Post::where('title', 'LIKE', "%{$request->search}%" )
                        ->orWhere('content', 'LIKE', "%{$request->search}%")->get(); 
        $pageTitel = 'المقالات';
        $route = 'post';
        $pageConfigs = ['pageHeader' => false];
        return view('/app/blog/blog-list', ['records' => $search, 'pageTitel' => $pageTitel, 'route' => $route, 'pageConfigs' => $pageConfigs]); 
    }  

    public function rules()
    {
        return  $rules = [
            'title' => 'required|string', 
            'content' => 'required|string', 
            ]; 
    }
    public function message()
    {
        return  $message = [
            'title.required' => ' العنوان مطلوب',
            'title.string'   => ' العنوان يجب ان يكون احرف',
            'content.required' => ' المحتوي  مطلوب', 
            ]; 
    }
}
