<?php 

namespace App\Http\ViewComposer;
  
use App\Models\Cader;
use App\Models\Gender;
use App\Models\JobStyle;
use App\Models\JobStatus;  
use App\Models\HealthStatus;
use App\Models\SocialStatus;
use App\Models\Qualification;
use App\Models\NominationType;
use App\Models\FinancialDegree;
use App\Models\FunctionalGroup;
use App\Models\MilitaryTreatment;
use Illuminate\Contracts\View\View;

class EmployeeViewComposer {
 
  
  public function compose(View $view) {  

    $view->with('cader', Cader::get());  
    $view->with('financialDegree', FinancialDegree::get());  
    $view->with('functionalGroup', FunctionalGroup::get());  
    $view->with('gender', Gender::get());  
    $view->with('healthStatus', HealthStatus::get());  
    $view->with('jobStatus', JobStatus::get());  
    $view->with('jobStyle', JobStyle::get());   
    $view->with('militaryTreatment', MilitaryTreatment::get());   
    $view->with('nominationType', NominationType::get());   
    $view->with('qualification', Qualification::get());   
    $view->with('socialStatus', SocialStatus::get());  
    
  } 
} 