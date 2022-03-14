<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubGroup extends Model 
{

    protected $table = 'sub_groups';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'code', 'functional_group_id']; 

    public function job_functions()
    {
        return $this->hasMany(JobFunction::class);
    }

    public function functional_group()
    {
        return $this->belongsTo(FunctionalGroup::class);
    }

}