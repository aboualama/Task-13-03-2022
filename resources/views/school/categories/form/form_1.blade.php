 


 
    <input type="hidden" value="custody" id="url">  

    <div class="row clear_form"> 
      <div class="col-12">
        <div class="form-group">
          <label for="item_des">الوصف</label>
          <textarea class="form-control " id="item_des" name="item_des" rows="5" placeholder="اضافة وصف الصنف" required></textarea> 
        </div>
      </div>   
      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="item_status"> حالة الصنف</label> 
              <select class="form-control" name="item_status"  id="item_status" required> 
                <option value="">.........  </option>
                <option  value="سليم">سليم</option> 
                <option  value="تالف">تالف</option> 
              </select>
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="item_type">نوع الصنف </label> 
              <select class="form-control" name="item_type" id="item_type" required>
                <option value="">.........  </option>
                <option  value="مستهلك">مستهلك</option> 
                <option  value="دائم ">دائم</option> 
              </select>
            </div>
          </div>     
        </div> 
      </div>  
      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="quantity"> الكمية</label> 
              <input type="number" class="form-control" name="quantity" id="quantity" placeholder=" " required  />  
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="insert_date">تاريخ الادخال </label> 
              <input  type="text" id="fp-default" class="form-control flatpickr-basic" name="insert_date" placeholder="YYYY-MM-DD" required>  
            </div>
          </div>     
        </div> 
      </div>    

      
      <div class="col-12 ">
        <button type="submit" id="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">   
          <span>أضافة</span>
        </button> 
      </div>
    </div> 

  
<script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script> 
  

   

  
{{-- https://github.com/balbarak/bootstrap-hijri-datepicker --}}

{{-- F:\projects\School\App\public\css\hijri.css --}}

{{-- F:\projects\School\App\resources\js\scripts\forms\pickers\hijri-pickadate.js --}}

{{-- @include('app.categories.form.36') --}}




{{-- 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{ asset('css/hijri.css') }}"> 
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="{{ asset(mix('js/scripts/forms/pickers/hijri-pickadate.js')) }}"></script> 


<script type="text/javascript">
  $(function () {
      $("#hijri-date-input").hijriDatePicker();
  });
</script> --}}