<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResidenceAddress extends Model 
{

    protected $table = 'residence_address';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['residence_address', 'residence_center', 'residence_city', 'employee_id'];

}  