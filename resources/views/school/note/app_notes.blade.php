
@extends('layouts/contentLayoutMaster')

@section('title', 'بيانات المدرسة')

@section('vendor-style')
  {{-- vendor css files --}} 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">   
  
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files --> 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">    
  
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection 
 
  
@section('content') 

 
    
<section   class="bs-validation">
  <div class="card">
    <div class="card-body"> 

      <form class="invoice-repeater" id="form" enctype="multipart/form-data">  
    
        <input type="hidden" value="notes" id="url">  

        <div class="tab-content">
          <!-- Account Tab starts -->
          <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel"> 
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="status"> العام الدراسي </label>
                  <select class="form-control" name="year_id" id="defaultyear" required>
                    <option value="">----</option>
                    @foreach ($allyears as $year) 
                      <option value="{{$year->id}}" {{($year->year  == $defaultyear->year) ? 'selected' : '' }}>{{$year->year}}</option> 
                    @endforeach
                  </select>
                  <span id="year_id_error" class="form-text text-danger small_error"> </span> 
                </div> 
              </div> 
               
              @php
                $notes = ['input'=> 'مذكرة ادخال', 'output'=> 'مذكرة مخرجات', 'missing'=> 'محضر فقد', 'retrieved'=> 'رجيع', 'damaged'=> 'تالف', 'transported'=> 'منقول',]
              @endphp

              <div class="col-md-6">
                <div class="form-group">
                  <label for="status">نوع المذكرة</label>
                  <select class="form-control" name="type" required> 
                    <option  value="">.........  </option>
                    @foreach ($notes as $key => $value) 
                      <option value="{{$key}}">{{$value}}</option> 
                    @endforeach
                  </select>
                  <span id="type_error" class="form-text text-danger small_error"> </span> 
                </div> 
              </div>     

              <div class="col-md-6">
                <div class="form-group">
                  <label for="status">نوع العهدة</label>
                  <select class="form-control" name="custody_type_id" id="custody" required> 
                    <option  value="">.........  </option>
                      @foreach ($categories as $category) 
                      <optgroup  label="{{ $category->name }}"> 
                          @foreach ($category->types as $type) 
                            <option value="{{$type->id}}"> -- {{$type->name}}</option> 
                          @endforeach 
                        </optgroup>
                      @endforeach
                  </select>
                  <span id="custody_type_id_error" class="form-text text-danger small_error"> </span> 
                </div> 
              </div>   
 
              <div class="col-md-12">
                <div class="form-group">
                  <label for="insert_date">تاريخ الادخال </label> 
                  <input  type="text" id="fp-default" class="form-control flatpickr-basic" name="insert_date" placeholder="YYYY-MM-DD" required> 
                  <span id="insert_date_error" class="form-text text-danger small_error"> </span>  
                </div>
              </div>  
            </div> 
          </div>  
  
        </div>





        <div data-repeater-list="files" >
          <div data-repeater-item>
            <div class="row d-flex ">
              <div class="col-md-4 col-12">
                <div class="form-group">
                  <label for="itemfile"> اختار ملف</label>
                  <input type="file" class="form-control" id="itemfile" name="itemfile" aria-describedby="itemfile" required>
                </div>
                <span id="files_error" class="form-text text-danger small_error"> </span> 
              </div>
    
              <div class="col-md-2 col-12 mt-2">
                <div class="form-group">
                  <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                    <i data-feather="trash-2" class="mr-25"></i>
                    <span>حذف</span> 
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button class="btn btn-icon btn-primary" type="button" data-repeater-create style="display: block; margin: 0 auto;">
              <i data-feather="plus" class="mr-25"></i>
              <span>اضافة ملف</span>
            </button>
          </div>
        </div>


        <hr />
 

        <button type="submit" id="submit" class="btn btn-success" style="margin-top:10px">Submit</button>


      </form> 
      
    </div>
  </div>
</section>
 
 
        
 
 
 
@endsection


@section('vendor-script')   
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>   
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>

  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection 

 


@section('page-script') 
  <script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>  
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script> 

  
<script>
  
  
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
 
  
  $(document).on('click', '#submit', function (e) {
      e.preventDefault(); 
         
        $(".small_error").text('');
        var url = $("#url").val(); 
        var formData = new FormData($('#form')[0]);
 
        console.log(url);
 
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {  
 
                if (data.status == 442){
                  $.each(data.errors, function (key, val) {
                    var newchar = '_'
                    var str = key.split('.').join(newchar); 
                    $("#" + str + "_error").text(val[0]); 
                  });
                }else{ 
                    toastr['success'](
                          'تم اضافة مذكرة جديدة بنجاح ',
                          '  المذكرة  ' ,
                          {
                            closeButton: true,
                            tapToDismiss: false, 
                            positionClass: 'toast-top-right',
                            rtl: 'rtl'
                          }
                        );   
                        
                    $("#form")[0].reset(); 
                } 
            }, error: function (xhr) {

            }
        });
         
  });
      
</script>   
@endsection



