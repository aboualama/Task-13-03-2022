  

@extends('layouts/contentLayoutMaster')

@section('title', 'بيانات المدرسة')

@section('vendor-style')  
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">  
@endsection

@section('page-style') 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">   
@endsection 
 
 

@section('content') 
   
  
  <form id="form_student" class="form-validate">

              
    <input type="hidden" value="students-count" id="student_url"> 

    <div class="row">
 
      <div class="col-md-12 col-12">
        <div class="form-group"> 
         <label for="status1" class="text-info">العام الدراسي</label>
         <input type="text" class="form-control" value="{{$defaultyear->year}}" disabled/>
         <input type="hidden" class="form-control" name="year_id" value="{{$defaultyear->id}}"/> 
        </div>
       </div> 
  

      <div class="col-md-12" id="section_inputs">


        <div class="row">

        
          @foreach ($stages as $stage)    

          <section id="divider-text-position" style="width: 98%; margin: auto;">
            <div class="row">
              <div class="col-md-12">
                <div class="divider divider-left {{ $loop->odd  ? 'divider-warning' : 'divider-info' }}"">
                  <div class="divider-text  {{ $loop->odd  ? 'text-warning' : 'text-info' }}">{{$stage->name}}</div>
                </div>
              </div>
            </div>
          </section>
          <section class="form-control-repeater" style="width: 100%;">
            <div class="col-md-12">
              <div class="row">
                
                
            @forelse ($stage->classrooms as $i => $classroom) 
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="role"> {{$classroom->classroom}}</label>
                    <input type="hidden" class="form-control" name="classroom[]"  value="{{$classroom->id}}">
                    <input type="number" class="form-control" name="count[]"  value="{{$classroom->students->where('year_id', $defaultyear->id)->first()->count ??  null}}" placeholder="0">
                    <span id="count_{{$i}}_error" class="form-text text-danger small_error"> </span>
                  </div>
                </div>
              
            @empty 
              -------
            @endforelse   


              </div>
            </div>
            
          </section>
          @endforeach   
        </div>  

        



        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
          <button type="submit" id="student_submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">حفظ</button> 
        </div>

      </div>


    </div>
  </form> 





  
@endsection








@section('vendor-script') 
  <!-- toastr -->
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script> 
@endsection 

@section('page-script') 
<script>




 
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

 

   
 $(document).on('click', '#student_submit', function (e) {
     e.preventDefault();
     $(".small_error").text('');
     var url = $("#student_url").val(); 
     var formData = new FormData($('#form_student')[0]); 
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
                       'تم اضافة فصل دراسي بنجاح ',
                       ' الفصول الدراسية ' ,
                       {
                         closeButton: true,
                         tapToDismiss: false, 
                         positionClass: 'toast-top-right',
                         rtl: 'rtl'
                       }
                     );    
                 setInterval(function(){
                   window.location.reload(1);
                 }, 3000);
             }
         }, error: function (xhr) {

         }
     });
 });
 
  </script>   

@endsection
 