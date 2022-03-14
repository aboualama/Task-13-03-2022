
@extends('layouts/contentLayoutMaster')

@section('title', 'طباعة التقارير ')

@section('vendor-style')     
@endsection

@section('page-style') 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">  
@endsection 
 

@section('content') 

 
<section class="app-user-edit">
  <div class="card"> 
    <div class="card-header d-flex justify-content-between pb-0">
      <h1 class="card-title">تقارير </h1>
      <div class="dropdown chart-dropdown">
      </div> 
      <section id="divider-text-position" style="width: 98%; margin: auto;">
        <div class="row">
          <div class="col-md-12"> 
              <div class="divider divider-left divider-warning">
                <h1 class="divider-text text-info"> العهدة </h1>
              </div>   
          </div>
        </div>
      </section>  
    </div>

    <div class="card-body pr-5 pl-5"> 
      <form id="form" action="{{url('/custody-report/')}}" method="POST" target="_blank"> 
        <div class="tab-content ">   
          {{-- <div class="row d-flex align-items-end "> --}}
          <div class="row d-flex">
            <div class="col-md-3  col-sm-12">
              <div class="form-group">
                <label for="status"> العام الدراسي </label>
                <select class="form-control" name="year_id" id="year" >
                  <option value="">----</option>
                  @foreach ($years as $year) 
                    <option value="{{$year->id}}" {{($year->year  == $defaultyear->year) ? 'selected' : '' }}>{{$year->year}}</option> 
                  @endforeach
                </select>
                <span id="year_id_error" class="form-text text-danger small_error"> </span> 
              </div> 
            </div>  
            <div class="col-md-3 col-sm-12">
              <div class="form-group">
                <label for="status">نوع العهدة</label>
                <select class="form-control" name="category_id" id="category" > 
                  <option  value="">.........  </option>
                  @foreach ($categories as $category) 
                    <option value="{{$category->id}}">{{$category->name}}</option> 
                  @endforeach
                </select>
              </div> 
            </div>  
            <div class="col-md-3 col-sm-12">
              <div class="form-group">
                <label for="role"> العهدة</label>
                <select class="form-control" name="custody_type_id" id="type"> 
                  <option  value=""> اختار نوع العهدة اولا</option>
                </select>
                <span id="custody_type_id_error" class="form-text text-danger small_error"> </span>     
              </div> 
            </div>   
            <div class="col-md-1 offset-md-2 col-sm-12">
              <div class="form-group mt-2">
                <button  type="submit" id="submit" class="btn btn-danger btn-block text-nowrap px-1 waves-effect" disabled>
                   <i data-feather='printer'></i>
                   <span class="ml-1">طباعة</span>
                </button>
              </div>
            </div>
          </div> 

        </div>  
      </form> 
    </div> 
  </div>
</section>


<section class="app-user-edit">
  <div class="card"> 
    <div class="card-header d-flex justify-content-between pb-0">
      <h1 class="card-title">تقارير </h1>
      <div class="dropdown chart-dropdown">
      </div> 
      <section id="divider-text-position" style="width: 98%; margin: auto;">
        <div class="row">
          <div class="col-md-12"> 
              <div class="divider divider-left divider-warning">
                <h1 class="divider-text text-info"> معلومات المدرسة </h1>
              </div>   
          </div>
        </div>
      </section>  
    </div>

    <div class="card-body pr-5 pl-5"> 
      <div class="row">
        <div class="col-md-4 col-sm-12 col-12">
          <div class=" ">
            <a type="trash" href="{{url('school_info-report')}}" class="model btn btn-icon btn-info m-2 p-2" style="width: 80%; margin: 1.5rem auto !important; display: block;"">  
               معلومات المدرسة
            </a> 
          </div> 
        </div>
        <div class="col-md-4 col-sm-12 col-12">
          <div class=" ">
            <a type="trash" href="{{url('message_vision_goals-report')}}" class="model btn btn-icon btn-success m-2 p-2" style="width: 80%; margin: 1.5rem auto !important; display: block;"">  
                 الرسالة - الرؤية - الاهداف
            </a> 
          </div> 
        </div> 
        <div class="col-md-4 col-sm-12 col-12">
          <div class=" ">
            <a type="trash" href="{{url('ministerial_num-report')}}" class="model btn btn-icon btn-warning m-2 p-2" style="width: 80%; margin: 1.5rem auto !important; display: block;"">  
              الررقم الوزاري
            </a> 
          </div> 
        </div> 
      </div> 
    </div> 
  </div>
</section>
 
 

@endsection


@section('vendor-script') 
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>    
@endsection  


@section('page-script') 
 
  <script>
  
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
 
  

    // change category
    $('#category').on("change", function (e) {
      e.stopPropagation();
      var id = $('#category').val();
      $.ajax({
        type: 'GET',
        data: { id: id },
        url: '/get-type/',
        success: function (data) {   
              $('#type').empty();
              $('#type').append('<option> .........</option>');
              $.each(data,function(index,type){
                $('#type').append('<option value="'+type.id+'">  '+ type.name +'</option>');
              }) 
        }
      });
    });

        
    // change type
    $('#type').on("change", function (e) {
      e.stopPropagation();
      var category_id = $('#category').val();
      var type_id = $('#type').val();
      $.ajax({
        type: 'GET',
        data: { 
          type_id: type_id , 
          category_id: category_id
        },
        url: '/get-type-form/',
        success: function (data) {   
          if($('#year').val() !== ''){ 
            $('#submit').prop("disabled", false);
          }
        }
      });
    });
      
     
    // change year
    $('#year').on("change", function (e) {
      e.stopPropagation();  
          if($('#type').val() !== ''){ 
            $('#submit').prop("disabled", false);
          } 
    });
     
  </script>   

@endsection
 