<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualification extends Model 
{

    protected $table = 'qualifications';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at']; 
    protected $fillable = ['name','code'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class)->withPivot('qualification_date', 'qualification_round', 'qualification_degree', 'qualification_major', 'qualification_source');
    }

}