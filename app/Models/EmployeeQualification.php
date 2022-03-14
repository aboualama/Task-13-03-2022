<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeQualification extends Model 
{

    protected $table = 'employee_qualification';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['employee_id', 'qualification_id', 'qualification_date', 'qualification_round', 'qualification_degree', 'qualification_major', 'qualification_source'];

}