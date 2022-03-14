   
    <input type="hidden" value="custody" id="url">  

    <div class="row clear_form"> 
      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="school_record_id">  السجلات المدرسية</label> 
              <select class="form-control" name="school_record_id" id="school_record_id"  required> 
                <option >.........  </option>
                @foreach ($school_records as $record) 
                  <option value="{{$record->id}}">{{$record->period}}</option> 
                @endforeach
              </select> 
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="school_record_type_id">نوع السجل </label> 
              <select class="form-control" name="school_record_type_id" id="school_record_type_id"  required>
                <option > اختار السجل اولا</option>
              </select>
            </div>
          </div>     
        </div> 
      </div>  
      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="record_no"> رقم السجل</label> 
              <input type="text" class="form-control" name="record_no" id="record_no" placeholder=" "  required> 
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="unit"> الوحدة</label> 
              <input type="text" class="form-control" name="unit" id="unit" placeholder=" "  required> 
            </div>
          </div>    
        </div> 
      </div>   
      <div class="col-12">
        <div class="form-group">
          <label for="record_description">وصف السجل</label>
          <textarea class="form-control " id="record_description" name="record_description" rows="5" placeholder="اضافة وصف السجل" required></textarea> 
        </div>
      </div>   
      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="quantity"> الكمية</label> 
              <input type="number" class="form-control" name="quantity" id="quantity" placeholder=" "  required> 
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="shortage"> النقص</label> 
              <input type="number" class="form-control" name="shortage" id="shortage" placeholder=" "  required> 
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


<script>  
 // change type
  $('#school_record_id').on("change", function (e) {
    e.stopPropagation();
    var school_record_id = $('#school_record_id').val(); 
    $.ajax({
      type: 'GET',
      data: { 
        school_record_id: school_record_id  
      },
      url: '/get-record-type/',
      success: function (data) {   
            $('#school_record_type_id').empty();
            $('#school_record_type_id').append('<option> .........</option>');
            $.each(data,function(index,type){
              $('#school_record_type_id').append('<option value="'+type.id+'">  '+ type.title +'</option>');
            }) 
      }
    });
  }); 
</script>    