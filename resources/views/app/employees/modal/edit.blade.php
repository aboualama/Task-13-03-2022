<style>
  .modal-body {
    max-height: calc(70vh);
    overflow-y: auto;
  }
</style>
 



<!-- Vertical Wizard -->
<section class="vertical-wizard">
  <div class="bs-stepper vertical vertical-wizard-example">
    <div class="bs-stepper-header">
      <div class="step" data-target="#account-details-vertical">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">1</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">البيانات الاساسية </span>
            <span class="bs-stepper-subtitle">  مثل : الاسم والرقم القومي</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#personal-info-vertical">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">2</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title"> المعلومات الشخصية</span>
            <span class="bs-stepper-subtitle">مثل : الحالة الاجتماعية والصحية</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#address-step-vertical">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">3</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">العنوان</span>
            <span class="bs-stepper-subtitle">   محل الميلاد / محل الاقامة</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#qualification-info-vertical">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">4</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title"> بيانات المؤهل الدراسي</span>
            <span class="bs-stepper-subtitle">  مثل : المؤهل وتاريخ التخرج والتقدير</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#job-info-vertical">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">5</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title"> بيانات وظيفية</span>
            <span class="bs-stepper-subtitle">  مثل : الوظيفة الحالية والدرجة المالية</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#social-links-vertical">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">6</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title"> بيانات التواصل </span>
            <span class="bs-stepper-subtitle">  مثل : ارقام التليفون | البريد الاليكتروني  </span>
          </span>
        </button>
      </div>
    </div>
    <div class="bs-stepper-content">
      <form id="form">
        @csrf @method('PUT')
        <input type="hidden" value="/employee/{{$employee->id}}" id="url"> 
        <input type="hidden" value="edit" id="type">   


        <div id="account-details-vertical" class="content">
          <div class="content-header">
            <h5 class="mb-0">البيانات الاساسية  </h5>
            <small class="text-muted">   مثل : الاسم والرقم القومي.</small>
          </div>
 
          <div class="content-body">
            <div class="row">
    
              <div class="col-12">
                <div class="divider divider-left divider-secondary">
                  <div class="divider-text text-secondary"> الاسم بالكامل</div>
                </div>   
                <div class="row">  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="first_name">  الاسم الاول</label> 
                      <input type="text" class="form-control" name="first_name" id="first_name" value="{{$employee->first_name ?? null}}"  required  />  
                    </div>
                  </div> 
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="last_name"> إسم الأب </label> 
                      <input  type="text" id="last_name" class="form-control" name="last_name" value="{{$employee->last_name ?? null}}"  required>  
                    </div>
                  </div> 
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="middle_name"> إسم الجد</label> 
                      <input type="text" class="form-control" name="middle_name" id="middle_name" value="{{$employee->middle_name ?? null}}"  required  />  
                    </div>
                  </div>   
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="family_name"> لقب العائلة </label> 
                      <input  type="text" id="family_name" class="form-control" name="family_name" value="{{$employee->family_name ?? null}}"  required>  
                    </div>
                  </div>     
                </div> 
              </div>  
  
              <div class="col-md-12">  
                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="national_id"> الرقم القومي</label> 
                      <input type="number" class="form-control" name="national_id" id="national_id" value="{{$employee->national_id ?? null}}"  required  />  
                    </div>
                  </div>   
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="gender"> النوع</label> 
                      <input type="text" class="form-control" name="gender" id="gender" value="{{$employee->gender->name ?? null}}"  required >  
                    </div>
                  </div>    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="birth_date"> تاريخ الميلاد  </label> 
                      <input  type="text" id="birth_date" class="form-control flatpickr-basic" name="birth_date" value="{{date("Y-m-d", strtotime($employee->birth_date)) ?? null}}" required >  
                    </div>
                  </div>    
                </div> 
              </div> 
            </div>
          </div>
          <div class="d-flex justify-content-between next_prev">
            <button class="btn btn-outline-secondary btn-prev" disabled>
              <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
              <span class="align-middle d-sm-inline-block d-none">السابق</span>
            </button>
            <button class="btn btn-primary btn-next">
              <span class="align-middle d-sm-inline-block d-none">التالي</span>
              <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
            </button>
          </div>
        </div>


        <div id="personal-info-vertical" class="content">
          <div class="content-header">
            <h5 class="mb-0"> المعلومات الشخصية</h5>
            <small class="text-muted">ادخال المعلومات الشخصية.</small>
          </div> 
          <div class="content-body">
            <div class="row">  

              <div class="col-md-12"> 
                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="social_status_id"> الحالة الاجتماعية </label> 
                      <select class="form-control" name="social_status_id"  id="social_status_id" required> 
                        <option value="">.........  </option> 
                        @foreach ($socialStatus as $record) 
                          <option value="{{$record->id}}" {{(($employee->social_status_id ?? null) == $record->id) ? 'selected' : ''}} >{{$record->name}}</option> 
                        @endforeach
                      </select>
                    </div>
                  </div>  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="health_status_id"> الحالة الصحية </label> 
                      <select class="form-control" name="health_status_id"  id="health_status_id" required> 
                        <option value="">.........  </option> 
                        @foreach ($healthStatus as $record) 
                          <option value="{{$record->id}}" {{(($employee->health_status_id ?? null) == $record->id) ? 'selected' : ''}}>{{$record->name}}</option> 
                        @endforeach
                      </select>
                    </div>
                  </div>     
                </div> 
              </div>    
       
              <div class="col-md-12 invoice-repeater" id="children_repeater" style="display: none">  
               
                  <div class="divider divider-left divider-secondary">
                    <div class="divider-text text-secondary">  بيانات الاطفال    </div>
                  </div>  
             
                <div data-repeater-list="children">
                  <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                      <div class="col-md-5 col-12">
                        <div class="form-group">
                          <label for="child_name"> الاسم</label>
                          <input type="text" class="form-control" id="child_name" name="child_name" aria-describedby="child_name" placeholder="أحمد" />
                        </div>
                      </div>
    
                      <div class="col-md-3 col-12">
                        <div class="form-group">
                          <label for="child_gender">النوع</label>
                          <select class="form-control" id="child_gender" name="child_gender" aria-describedby="child_gender" required> 
                            <option value="">.........  </option>
                            <option  value="ذكر">ذكر</option> 
                            <option  value="انثي">انثي</option>  
                          </select>
                        </div>
                      </div>
    
                      <div class="col-md-3 col-12">
                        <div class="form-group">
                          <label for="child_brith">تاريخ الميلاد</label>
                          <input type="text"  name="child_brith" class="form-control pickadate-months-year picker__input picker__input--active" placeholder="YYYY-MM-DD" readonly="" aria-haspopup="true" aria-readonly="false" aria-owns="pd-months-year_root">
                        </div>
                      </div>
     
    
                      <div class="col-md-1 col-12 ">
                        <div class="form-group">
                          <button class="btn btn-danger text-nowrap px-1" data-repeater-delete type="button">
                            <i data-feather="trash-2" class="mr-25"></i> 
                          </button>
                        </div>
                      </div>
                    </div>
                    <hr />
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <button class="btn btn-icon btn-success" type="button" data-repeater-create style="float: left">
                      <i data-feather="plus" class="mr-25"></i>
                      <span>  اضافة طفل جديد</span>
                    </button>
                  </div>
                </div>
              </div>


              <div class="col-md-12"> 
                <div class="row">  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="military_treatment_id">  المعاملة العسكرية </label> 
                      <select class="form-control" name="military_treatment_id"  id="military_treatment_id" required> 
                        <option value="">.........  </option> 
                        @foreach ($militaryTreatment as $record) 
                          <option value="{{$record->id}}" {{(($employee->health_status_id ?? null) == $record->id) ? 'selected' : ''}}>{{$record->name}}</option> 
                        @endforeach
                      </select>
                    </div>
                  </div>    
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="military_summons"> الاستدعاء  </label> 
                      <textarea class="form-control" id="military_summons" name="military_summons">{{$employee->military_summons ?? null}}</textarea> 
                    </div>
                  </div>     
                </div> 
              </div>   

            </div> 
          </div>
          <div class="d-flex justify-content-between next_prev">
            <button class="btn btn-primary btn-prev">
              <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
              <span class="align-middle d-sm-inline-block d-none">السابق</span>
            </button>
            <button class="btn btn-primary btn-next">
              <span class="align-middle d-sm-inline-block d-none">التالي</span>
              <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
            </button>
          </div>
        </div>



        <div id="address-step-vertical" class="content">
          <div class="content-header">
            <h5 class="mb-0">العنوان</h5> 
            <small class="text-muted">اضافة محل الميلاد / محل الاقامة.</small>
          </div> 
          <div class="content-body">
            <div class="row">
              <div class="col-md-12"> 
                <div class="divider divider-left divider-secondary">
                  <div class="divider-text text-secondary"> محل الميلاد  </div>
                </div>   
                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="birth_address"> العنوان    </label> 
                      <input type="text" class="form-control" name="birth_address" id="birth_address" value="{{$employee->birth_address ?? null}}">  
                    </div>
                  </div>    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="birth_center"> مركز / قسم  </label> 
                      <input type="text" id="birth_center" class="form-control" name="birth_center" value="{{$employee->birth_center ?? null}}">  
                    </div>
                  </div>  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="birth_city"> المحافظة  </label> 
                      <input type="text" id="birth_city" class="form-control" name="birth_city" value="{{$employee->birth_city ?? null}}" >  
                    </div>
                  </div>    
                </div> 
              </div>  
              <div class="col-md-12"> 
                <div class="divider divider-left divider-secondary">
                  <div class="divider-text text-secondary"> محل الاقامة  </div>
                </div>   
                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="residence_address"> العنوان    </label> 
                      <input type="text" class="form-control" name="residence_address" id="residence_address" value="{{$employee->currently_address()->residence_address ?? null}}">  
                    </div>
                  </div>    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="residence_center"> مركز / قسم  </label> 
                      <input type="text" id="residence_center" class="form-control" name="residence_center" value="{{$employee->currently_address()->residence_center ?? null}}">  
                    </div>
                  </div>  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="residence_city"> المحافظة  </label> 
                      <input type="text" id="residence_city" class="form-control" name="residence_city" value="{{$employee->currently_address()->residence_city ?? null}}">  
                    </div>
                  </div>       
                </div> 
              </div>  
            </div> 
          </div>

          <div class="d-flex justify-content-between next_prev">
            <button class="btn btn-primary btn-prev">
              <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
              <span class="align-middle d-sm-inline-block d-none">السابق</span>
            </button>
            <button class="btn btn-primary btn-next">
              <span class="align-middle d-sm-inline-block d-none">التالي</span>
              <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
            </button>
          </div>
        </div>



        <div id="qualification-info-vertical" class="content">
          <div class="content-header">
            <h5 class="mb-0">بيانات المؤهل الدراسي </h5>
            <small class="text-muted">   مثل : المؤهل وتاريخ التخرج والتقدير.</small>
          </div>
 
          <div class="content-body">
            <div class="row"> 
              <div class="col-12">  
                <div class="divider divider-left divider-secondary">
                  <div class="divider-text text-secondary"> المؤهل الدراسي  </div>
                </div> 
                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="qualification_id">  المؤهل    </label>  
                      <select class="form-control" name="qualification_id"  id="qualification_id" required> 
                        <option value="">.........  </option> 
                        @foreach ($qualification as $record) 
                          <option value="{{$record->id}}" {{(($employee->currently_qualification()->pivot->qualification_id ?? null) == $record->id) ? 'selected' : ''}}>{{$record->name}}</option> 
                        @endforeach
                      </select>
                    </div> 
                  </div>    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="qualification_date"> التاريخ  </label> 
                      <input type="text" id="qualification_date" class="form-control" name="qualification_date" value="{{$employee->currently_qualification()->pivot->qualification_date ?? null}}">  
                    </div>
                  </div>  
                  <div class="col-md-3"> 
                    <div class="form-group">
                      <label for="qualification_round">  الدور </label>   
                      <select class="form-control" name="qualification_round"  id="qualification_round" required> 
                        <option value="">.........  </option>
                        <option value="أول" {{(($employee->currently_qualification()->pivot->qualification_round ?? null) == 'أول') ? 'selected' : ''}}>الاول</option> 
                        <option value="ثاني" {{(($employee->currently_qualification()->pivot->qualification_round ?? null) == 'ثاني') ? 'selected' : ''}}>الثاني</option>    
                      </select>
                    </div>
                  </div>       
                </div> 
              </div>  
  
              <div class="col-md-12">  
                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="qualification_source"> جهة الاصدار    </label> 
                      <input type="text" class="form-control" name="qualification_source" id="qualification_source"  value="{{$employee->currently_qualification()->pivot->qualification_source ?? null}}">  
                    </div>
                  </div>    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="qualification_degree"> درجة المؤهل  </label> 
                      <input type="text" id="qualification_degree" class="form-control" name="qualification_degree"  value="{{$employee->currently_qualification()->pivot->qualification_degree ?? null}}">  
                    </div>
                  </div>  
                  <div class="col-md-3"> 
                    <div class="form-group">
                      <label for="qualification_major"> التخصص   </label> 
                      <input type="text" id="qualification_major" class="form-control" name="qualification_major"  value="{{$employee->currently_qualification()->pivot->qualification_major ?? null}}">  
                    </div>
                  </div>       
                </div> 
              </div> 
            </div>
          </div>
          <div class="d-flex justify-content-between next_prev">
            <button class="btn btn-primary btn-prev">
              <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
              <span class="align-middle d-sm-inline-block d-none">السابق</span>
            </button>
            <button class="btn btn-primary btn-next">
              <span class="align-middle d-sm-inline-block d-none">التالي</span>
              <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
            </button>
          </div>
        </div>



        <div id="job-info-vertical" class="content">
          <div class="content-header">
            <h5 class="mb-0">البيانات الوظيفية  </h5>
            <small class="text-muted">   مثل : الوظيفة الحالية والدرجة المالية.</small>
          </div>
 
          <div class="content-body">
            <div class="row">
    
              <div class="col-12">
                <div class="divider divider-left divider-secondary">
                  <div class="divider-text text-secondary"> الوظيفة الحالية  </div>
                </div>   

                <div class="row">    
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="functional_group_id">المجموعة الوظيفية </label>
                      <select class="form-control" name="functional_group_id" id="functional_group_id" > 
                        <option  value="">.........  </option>
                        @foreach ($functionalGroup as $record) 
                          <option value="{{$record->id}}" {{(($employee->currently_job()->sub_group->functional_group->id ?? null) == $record->id) ? 'selected' : ''}}>{{$record->name}}</option> 
                        @endforeach
                      </select>
                    </div> 
                  </div> 
    
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="sub_group_id"> المجموعة النوعية</label>
                      <select class="form-control" name="sub_group_id" id="sub_group_id"> 
                        <option value="{{$employee->currently_job()->sub_group->id ?? null}}">{{$employee->currently_job()->sub_group->name ?? null}}</option> 
                        <option disabled> يجب اعادة اختيار المجموعة الوظيفية اولا</option>
                      </select>
                    </div> 
                  </div> 
    
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="job_function_name">  المسمى الوظيفى </label>
                      <input type="text" class="form-control" name="job_function_name" id="job_function_name" value="{{$employee->currently_job()->job_function_name ?? null}}" required  />  
                    </div> 
                  </div>  
                </div> 
              </div>  
  
              <div class="col-md-12">  
                <div class="row">  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="financial_degree_id">  الدرجة الوظيفية</label> 
                      <select class="form-control" name="financial_degree_id"  id="financial_degree_id" required> 
                        <option value="">.........  </option>
                        @foreach ($financialDegree as $record) 
                          <option value="{{$record->id}}" {{(($employee->currently_job()->financial_degree_id ?? null) == $record->id) ? 'selected' : ''}}>{{$record->name}}</option> 
                        @endforeach
                      </select>
                    </div>
                  </div>  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="degree_date">  تاريخ الدرجة الوظيفية</label> 
                      <input  type="text" id="degree_date" class="form-control flatpickr-basic" name="degree_date" value="{{date("Y-m-d", strtotime($employee->currently_job()->degree_date ?? '1900-01-01'))}}" required>  
                    </div>
                  </div>     
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="join_date">تاريخ التوظيف </label> 
                      <input  type="text" id="join_date" class="form-control flatpickr-basic" name="join_date" value="{{date("Y-m-d", strtotime($employee->currently_job()->join_date ?? '1900-01-01'))}}" required>  
                    </div>
                  </div>    
                </div> 
              </div> 
  
              <div class="col-md-12">  
                <div class="row">  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="job_style_id">   اسلوب شغل الوظيفة</label> 
                      <select class="form-control" name="job_style_id"  id="job_style_id" required> 
                        <option value="">.........  </option>
                        @foreach ($jobStyle as $record) 
                          <option value="{{$record->id}}" {{(($employee->jobs_history->first()->job_style_id ?? null) == $record->id) ? 'selected' : ''}}>{{$record->name}}</option> 
                        @endforeach
                      </select>
                    </div>
                  </div>   
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="cader_id"> الكادر</label> 
                      <select class="form-control" name="cader_id"  id="cader_id" required> 
                        <option value="">.........  </option>
                        @foreach ($cader as $record) 
                          <option value="{{$record->id}}" {{(($employee->currently_job()->cader_id ?? null) == $record->id) ? 'selected' : ''}}>{{$record->name}}</option> 
                        @endforeach
                      </select>
                    </div>
                  </div>  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="job_status_id"> الحالة الوظيفية</label> 
                      <select class="form-control" name="job_status_id"  id="job_status_id" required> 
                        <option value="">.........  </option>
                        @foreach ($jobStatus as $record) 
                          <option value="{{$record->id}}" {{(($employee->jobs_history->first()->job_status_id ?? null) == $record->id) ? 'selected' : ''}}>{{$record->name}}</option> 
                        @endforeach
                      </select>
                    </div>
                  </div>    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="nomination_type_id">نوع التعيين  </label> 
                      <select class="form-control" name="nomination_type_id"  id="nomination_type_id" required> 
                        <option value="">.........  </option>
                        @foreach ($nominationType as $record) 
                          <option value="{{$record->id}}" {{(($employee->jobs_history->first()->nomination_type_id ?? null) == $record->id) ? 'selected' : ''}}>{{$record->name}}</option> 
                        @endforeach
                      </select>  
                    </div>
                  </div>    
                </div> 
              </div> 
            </div>
          </div>
          <div class="d-flex justify-content-between next_prev">
            <button class="btn btn-primary btn-prev">
              <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
              <span class="align-middle d-sm-inline-block d-none">السابق</span>
            </button>
            <button class="btn btn-primary btn-next">
              <span class="align-middle d-sm-inline-block d-none">التالي</span>
              <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
            </button>
          </div>
        </div>



        <div id="social-links-vertical" class="content">
          <div class="content-header">
            <h5 class="mb-0">   بيانات التواصل</h5>
            <small class="text-muted">مثل : ارقام التليفون | البريد الاليكتروني.</small>
          </div>
          <div class="content-body">
            <div class="row"> 
              <div class="col-12">
                <div class="row">   
                  <div class="col-md-12"> 
                    <div class="divider divider-left divider-secondary">
                      <div class="divider-text text-secondary"> ارقام التليفونات </div>
                    </div>   
                    <div class="row">  
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="cell1"> رقم الهاتف / واتساب</label> 
                          <input type="number" class="form-control" name="cell[]" id="cell1" value="{{$employee->phones[0]->number ?? null}}">  
                        </div>
                      </div>    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="cell2"> رقم اخر </label> 
                          <input  type="number" class="form-control" name="cell[]" id="cell2" value="{{$employee->phones[1]->number ?? null}}">  
                        </div>
                      </div>     
                    </div> 
                  </div>  
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="form-label" for="vertical-twitter">Twitter</label>
                    <input type="text" id="vertical-twitter" class="form-control" placeholder="https://twitter.com/abc" />
                  </div>
                  <div class="form-group col-md-6">
                    <label class="form-label" for="vertical-facebook">Facebook</label>
                    <input type="text" id="vertical-facebook" class="form-control" placeholder="https://facebook.com/abc" />
                  </div>
                </div> 
              </div> 
            </div> 
          </div> 
          <div class="d-flex justify-content-between next_prev">
            <button class="btn btn-primary btn-prev">
              <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
              <span class="align-middle d-sm-inline-block d-none">السابق</span>
            </button>
            <button id="add_new_employee" class="btn btn-success btn-submit">
              <span class="align-middle d-sm-inline-block d-none">  حفظ </span> 
              <i data-feather="save" class="align-middle ml-sm-25 ml-0"></i>
            </button>
          </div>
        </div> 


      </form> 
    </div>
  </div>
</section>  