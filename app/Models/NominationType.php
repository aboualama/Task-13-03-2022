<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NominationType extends Model 
{

    protected $table = 'nomination_types';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at']; 
    protected $fillable = ['name','code'];

}