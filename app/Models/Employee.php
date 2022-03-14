<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model 
{ 
    use HasFactory;
    
    protected $table = 'employees';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'family_name', 'national_id', 'birth_address', 'birth_city', 'birth_center', 'birth_date', 'join_date', 'gender_id', 'health_status_id', 'social_status_id', 'military_treatment_id', 'military_summons'];

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function health_status()
    {
        return $this->belongsTo(HealthStatus::class);
    }

    public function social_status()
    {
        return $this->belongsTo(SocialStatus::class);
    }

    public function military_treatment()
    {
        return $this->belongsTo(MilitaryTreatment::class);
    }

    public function qualifications()
    {
        return $this->belongsToMany(Qualification::class)->withPivot('qualification_date', 'qualification_round', 'qualification_degree', 'qualification_major', 'qualification_source');
    }

    public function jobs_history()
    {
        return $this->hasMany(JobHistory::class);
    }

    public function children()
    {
        return $this->hasMany(Children::class);
    }

    public function address()
    {
        return $this->hasMany(ResidenceAddress::class);
    }

    public function languages()
    {
        return $this->hasMany(Language::class);
    }


    




    
    protected $appends = ['full_name'];


    public function getFullNameAttribute()
    { 
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name . ' ' . $this->family_name; 
    }

    public function currently_job()
    { 
        return $this->jobs_history()->where('currently', 1)->first();
    }

    public function currently_address()
    { 
        return $this->address()->latest()->first();
    }

    public function currently_qualification()
    { 
        return $this->qualifications()->get()->last();
    }

    public function latestActivity()
{
    return $this->hasOne(JobHistory::class)->latest();
}
}