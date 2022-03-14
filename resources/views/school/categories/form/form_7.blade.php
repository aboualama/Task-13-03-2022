  

 
    <input type="hidden" value="custody" id="url">  

    <div class="row clear_form">  

      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="serial_number"> رقم مسلسل</label> 
              <input type="number" class="form-control" name="serial_number" id="serial_number" placeholder=" " required> 
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="count"> العدد </label> 
              <input type="number" class="form-control" name="count" id="count" placeholder=" " required> 
            </div>
          </div>    
        </div> 
      </div>   
 

      <div class="col-12">
        <div class="form-group">
          <label for="custody_name"> اسم العهدة</label> 
          <input type="text" class="form-control" name="custody_name" id="custody_name" placeholder=" " required> 
        </div>
      </div>   
  

      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="received_date">تاريخ الاستلام </label> 
              <input  type="text" id="fp-default" class="form-control flatpickr-basic" name="received_date" placeholder="YYYY-MM-DD" required>  
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="retrieved_date">تاريخ الاعادة </label> 
              <input  type="text" id="retrieved_date" class="form-control flatpickr-basic" name="retrieved_date" placeholder="YYYY-MM-DD" required>  
            </div>
          </div>     
        </div> 
      </div>    
 

      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="received_signature">  توقيع المستلم</label> 
              <input type="text" class="form-control" name="received_signature" id="received_signature" placeholder=" " required> 
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="recipient_signature"> توقيع مستلم العهدة المسترجعه </label> 
              <input type="text" class="form-control" name="recipient_signature" id="recipient_signature" placeholder=" " required> 
            </div>
          </div>    
        </div> 
      </div>   
 
      <div class="col-md-12">
        <div class="form-group">
          <label for="notes"> الملاحظات</label>  
          <textarea class="form-control " id="notes" name="notes" rows="5" placeholder="اضاف بعض الملاحظات" required></textarea> 
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