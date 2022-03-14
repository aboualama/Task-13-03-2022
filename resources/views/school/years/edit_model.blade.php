 

<section class="app-user-edit">
  <div class="card">
    <div class="card-body"> 
      <div class="tab-content"> 
        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
 
          <form id="form" class="form-validate"> 
            <input type="hidden" value="other-settings" id="url">
            <input type="hidden" class="form-control" value="{{ $record->id }}" name="year_id" > 
            
            <div class="row">

              <div class="col-md-12">
                <div class="form-group">
                  <label for="status">العام الدراسي</label>
                  <select class="form-control" name="year_id" id="year" disabled>
                    <option value="{{ $record->id }}">{{ $record->year }}</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-12" id="section_inputs">
                
                                
                <div class="row"> 
                  <section id="divider-text-position" style="width: 98%; margin: auto;">
                    <div class="row">
                      <div class="col-md-12"> 
                          <div class="divider divider-left divider-danger">
                            <div class="divider-text text-danger">الاجماليات</div>
                          </div>   
                      </div>
                    </div>
                  </section>  
                    <div class="col-md-12"> 
                      <div class="row">  
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role"> الوكيلات</label> 
                            <input type="number" class="form-control" name="agents" id="agents" value="{{$record->settings->agents ??  0}}" >
                            <span id="agents_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role"> الاداريات </label> 
                            <input type="number" class="form-control" name="administrators" id="administrators" value="{{$record->settings->administrators ??  0}}" >
                            <span id="administrators_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role">المعلمات </label> 
                            <input type="number" class="form-control" name="teachers" id="teachers" value="{{$record->settings->teachers ??  0}}" >
                            <span id="teachers_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>  
                      </div> 
                    </div>

                     
                    <div class="col-md-12"> 
                      <div class="row">  
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role"> الطالبات</label> 
                            <input type="number" class="form-control"   placeholder="{{\App\Models\StudentCount::where('year_id', $record->id)->sum('count') ??  0}}" disabled >
                            <span id="students_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role">المستخدمات </label> 
                            <input type="number" class="form-control" name="users" id="users" value="{{$record->settings->users ??  0}}" >
                            <span id="users_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role">عدد الحراس</label> 
                            <input type="number" class="form-control" name="guards" id="guards" value="{{$record->settings->guards ??  0}}" >
                            <span id="guards_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>  
                      </div> 
                    </div>  
                </div>
               
 
                <div class="row">

                  <section id="divider-text-position" style="width: 98%;margin: auto;">
                    <div class="row">
                      <div class="col-md-12"> 
                          <div class="divider divider-left divider-warning">
                            <div class="divider-text text-warning">الرقم الوزاري</div>
                          </div>   
                      </div>
                    </div>
                  </section>
   
                  <div class="col-md-12"> 
                    <div class="row">  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="role"> قسم الابتدائي</label> 
                          <input type="number" class="form-control" name="primary_no" id="primary_no" value="{{$record->settings->primary_no ??  0}}" >
                          <span id="primary_no_error" class="form-text text-danger small_error"> </span> 
                        </div>
                      </div>   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="role">قسم المتوسط </label> 
                          <input type="number" class="form-control" name="middle_no" id="middle_no" value="{{$record->settings->middle_no ??  0}}" >
                          <span id="middle_no_error" class="form-text text-danger small_error"> </span> 
                        </div>
                      </div>   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="role">قسم الثانوي</label> 
                          <input type="number" class="form-control" name="secondary_no" id="secondary_no" value="{{$record->settings->secondary_no ??  0}}" >
                          <span id="secondary_no_error" class="form-text text-danger small_error"> </span> 
                        </div>
                      </div>  
                    </div> 
                  </div>
                </div>   

                <hr /> 
                <div class="row">
                  <div class="col-12">  
                    <button class="btn btn-icon btn-success" id="submit" type="submit"> 
                     <i data-feather="plus"></i>
                      <span>تعديل</span>
                    </button>
                  </div>
                </div>   
              </div> 
            </div>
          </form> 
        </div>  
      </div>
    </div>
  </div>
</section>
 