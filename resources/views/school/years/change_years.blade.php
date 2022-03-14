 
                    
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
    {{-- <section class="form-control-repeater" style="width: 100%;"> --}}
      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-4">
            <div class="form-group">
              <label for="role"> الوكيلات</label> 
              <input type="number" class="form-control" name="agents" id="agents" placeholder="{{$record->settings->agents ??  0}}" disabled>
              <span id="agents_error" class="form-text text-danger small_error"> </span> 
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group">
              <label for="role"> الاداريات </label> 
              <input type="number" class="form-control" name="administrators" id="administrators" placeholder="{{$record->settings->administrators ??  0}}" disabled>
              <span id="administrators_error" class="form-text text-danger small_error"> </span> 
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group">
              <label for="role">المعلمات </label> 
              <input type="number" class="form-control" name="teachers" id="teachers" placeholder="{{$record->settings->teachers ??  0}}" disabled>
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
              <input type="number" class="form-control" name="students" id="students" placeholder="{{\App\Models\StudentCount::where('year_id', $record->id)->sum('count')}}" disabled>
              <span id="students_error" class="form-text text-danger small_error"> </span> 
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group">
              <label for="role">المستخدمات </label> 
              <input type="number" class="form-control" name="users" id="users" placeholder="{{$record->settings->users ??  0}}" disabled>
              <span id="users_error" class="form-text text-danger small_error"> </span> 
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group">
              <label for="role">عدد الحراس</label> 
              <input type="number" class="form-control" name="guards" id="guards" placeholder="{{$record->settings->guards ??  0}}" disabled>
              <span id="guards_error" class="form-text text-danger small_error"> </span> 
            </div>
          </div>  
        </div> 
      </div>
    {{-- </section>   --}}
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
            <input type="number" class="form-control" name="primary_no" id="primary_no" placeholder="{{$record->settings->primary_no ??  0}}" disabled>
            <span id="primary_no_error" class="form-text text-danger small_error"> </span> 
          </div>
        </div>   
        <div class="col-md-4">
          <div class="form-group">
            <label for="role">قسم المتوسط </label> 
            <input type="number" class="form-control" name="middle_no" id="middle_no" placeholder="{{$record->settings->middle_no ??  0}}" disabled>
            <span id="middle_no_error" class="form-text text-danger small_error"> </span> 
          </div>
        </div>   
        <div class="col-md-4">
          <div class="form-group">
            <label for="role">قسم الثانوي</label> 
            <input type="number" class="form-control" name="secondary_no" id="secondary_no" placeholder="{{$record->settings->secondary_no ??  0}}" disabled>
            <span id="secondary_no_error" class="form-text text-danger small_error"> </span> 
          </div>
        </div>  
      </div> 
    </div>
  </div> 
                   
                 