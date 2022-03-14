<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobStyle extends Model 
{

    protected $table = 'job_styles';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at']; 
    protected $fillable = ['name','code'];

} 