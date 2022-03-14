<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
 
    protected $fillable = ['title', 'slug', 'content', 'image', 'status', 'category_id', 'views'];  

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
