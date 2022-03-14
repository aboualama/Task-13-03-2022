<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobHistory extends Model 
{

    protected $table = 'job_history';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['join_date', 'employee_id', 'sub_group_id', 'job_function_name', 'financial_degree_id', 'degree_date', 'job_style_id', 'cader_id', 'job_status_id', 'nomination_type_id', 'currently'];

    public function job_functions()
    {
        return $this->belongsTo(JobFunction::class);
    }

    public function financial_degree()
    {
        return $this->belongsTo(FinancialDegree::class);
    }


    public function sub_group()
    {
        return $this->belongsTo(SubGroup::class);
    }

    public function job_style()
    {
        return $this->belongsTo(JobStyle::class);
    }

    public function cader()
    {
        return $this->belongsTo(Cader::class);
    }

    public function nomination_type()
    {
        return $this->belongsTo(NominationType::class);
    }

    public function job_status()
    {
        return $this->belongsTo(JobStatus::class);
    }

}