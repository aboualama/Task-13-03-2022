
@extends('layouts/contentLayoutMaster')

@section('title', $pageTitel)


@section('vendor-style') 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('page-style') 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">  
@endsection 
 
@section('content')
  
 

<section class="app-user-edit">
  <div class="card"> 
    <div class="card-header d-flex justify-content-between pb-0">
      <h1 class="card-title"> تقارير مجمعة </h1>
      <div class="dropdown chart-dropdown">
      </div> 
      <section id="divider-text-position" style="width: 98%; margin: auto;">
        <div class="row">
          <div class="col-md-12"> 
              <div class="divider divider-left divider-warning">
                <h1 class="divider-text text-info">  ملفات الاكسيل  </h1>
              </div>   
          </div>
        </div>
      </section>  
    </div>

    <div class="card-body pr-5 pl-5"> 
      <div class="row">
        <div class="col-md-4 col-sm-12 col-12">
          <div class=" ">
            <a type="trash" href="{{url('export_employees_sheet')}}" class="model btn btn-icon btn-info p-2" style="width: 90%;">  
               معلومات جميع الموظفين
            </a> 
          </div> 
        </div>
        <div class="col-md-4 col-sm-12 col-12">
          <div class=" ">
            <a type="trash" href="{{url('export_empl_cader_sheet')}}" class="model btn btn-icon btn-success p-2" style="width: 90%;">  
                 الموظفين بالكادر العام
            </a> 
          </div> 
        </div> 
        <div class="col-md-4 col-sm-12 col-12">
          <div class=" ">
            <a href="{{url('export_empl_cader_sub_sheet')}}" class=" btn btn-icon btn-warning p-2"  style="width: 90%;">  
               الموظفين العاملين بالوظائف الاشرافية
            </a> 
          </div> 
        </div> 
      </div> 
    </div> 
  </div>
</section>
 

 
<section class="app-user-edit">
  <div class="card"> 
    <div class="card-header d-flex justify-content-between pb-0">
      <h1 class="card-title">تقارير فردية  </h1>
      <div class="dropdown chart-dropdown">
      </div> 
 
          <section id="divider-text-position" style="width: 98%; margin: auto;">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="divider divider-left divider-warning">
                    <h1 class="divider-text text-info"> بيان حالة </h1>
                  </div>   
              </div>
            </div>
          </section> 
          <div class="card-body pr-5 pl-5"> 
            <form id="form" action="{{url('/report/')}}" method="POST" target="_blank"> 
              <div class="tab-content ">   
                {{-- <div class="row d-flex align-items-end "> --}}
                <div class="row d-flex">
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label for="status">  قائمة الموظفين </label>
                      <select class="select2 form-control form-control-lg select2-hidden-accessible" name="employee_id" id="employee" >
                        <option value="">----</option> 
                        @foreach ($records['employee'] as $employee) 
                          <option value="{{$employee->id}}">{{$employee->full_name}}</option> 
                        @endforeach
                      </select>
                      <span id="employee_id_error" class="form-text text-danger small_error"> </span> 
                    </div> 
                  </div>    
                  <div class="col-md-3 offset-md-1 col-sm-12">
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
  

          <section id="divider-text-position" style="width: 98%; margin: auto;">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="divider divider-left divider-warning">
                    <h1 class="divider-text text-info"> إقرار استلام العمل </h1>
                  </div>   
              </div>
            </div>
          </section> 
          <div class="card-body pr-5 pl-5"> 
            <form id="form" action="{{url('/report/')}}" method="POST" target="_blank"> 
              <div class="tab-content ">   
                {{-- <div class="row d-flex align-items-end "> --}}
                <div class="row d-flex">
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label for="status">  قائمة الموظفين </label>
                      <select class="select2 form-control form-control-lg select2-hidden-accessible" name="employee_id" id="employee" >
                        <option value="">----</option> 
                        @foreach ($records['employee'] as $employee) 
                          <option value="{{$employee->id}}">{{$employee->full_name}}</option> 
                        @endforeach
                      </select>
                      <span id="employee_id_error" class="form-text text-danger small_error"> </span> 
                    </div> 
                  </div>    
                  <div class="col-md-3 offset-md-1 col-sm-12">
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
  </div>
</section>


@endsection 




@section('vendor-script') 
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>    
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection  


@section('page-script') 
 
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>

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
 