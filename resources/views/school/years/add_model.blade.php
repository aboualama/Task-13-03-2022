<section class="app-user-edit">
  <div class="card">
    <div class="card-body">

      <div class="tab-content">

         <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
 
          <form id="form" class="form-validate"> 
            <input type="hidden" value="other-settings" id="url"> 

            <div class="row"> 
              <div class="col-md-12">
                <div class="form-group">
                  <label for="status">العام الدراسي</label>
                  <select class="form-control" name="year_id" id="year" > 
                      @foreach ($records as $record) 
                      <option value="{{$record->id}}">{{$record->year}}</option> 
                    @endforeach
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
                  <section class="form-control-repeater" style="width: 100%;">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role"> الوكيلات</label>
                            <input type="number" class="form-control" name="agents" id="agents"
                              placeholder="........" >
                            <span id="agents_error" class="form-text text-danger small_error"> </span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role"> الاداريات </label>
                            <input type="number" class="form-control" name="administrators" id="administrators"
                              placeholder="........" >
                            <span id="administrators_error" class="form-text text-danger small_error"> </span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role">المعلمات </label>
                            <input type="number" class="form-control" name="teachers" id="teachers"
                              placeholder="........" >
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
                            <input type="number" class="form-control" 
                              placeholder="........" disabled>
                            <span id="students_error" class="form-text text-danger small_error"> </span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role">المستخدمات </label>
                            <input type="number" class="form-control" name="users" id="users"
                              placeholder="........" >
                            <span id="users_error" class="form-text text-danger small_error"> </span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role">عدد الحراس</label>
                            <input type="number" class="form-control" name="guards" id="guards"
                              placeholder="........" >
                            <span id="guards_error" class="form-text text-danger small_error"> </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
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
                          <input type="number" class="form-control" name="primary_no" id="primary_no"
                            placeholder="........" >
                          <span id="primary_no_error" class="form-text text-danger small_error"> </span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="role">قسم المتوسط </label>
                          <input type="number" class="form-control" name="middle_no" id="middle_no"
                            placeholder="........" >
                          <span id="middle_no_error" class="form-text text-danger small_error"> </span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="role">قسم الثانوي</label>
                          <input type="number" class="form-control" name="secondary_no" id="secondary_no"
                            placeholder="........" >
                          <span id="secondary_no_error" class="form-text text-danger small_error"> </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 

                <hr /> 
                <div class="row">
                  <div class="col-12">  
                    <button class="btn btn-icon btn-primary" id="submit" type="submit"> 
                     <i data-feather="plus"></i>
                      <span>حفظ</span>
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