<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FunctionalGroup extends Model 
{

    protected $table = 'functional_groups';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name','code'];

    public function sub_groups()
    {
        return $this->hasMany(SubGroup::class);
    }

    public function job_functions()
    {
        return $this->hasManyThrough(JobFunction::class, SubGroup::class);
    }

}