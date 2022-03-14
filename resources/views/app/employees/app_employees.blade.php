 

@extends('layouts/contentLayoutMaster')

@section('title', 'قائمة الموظفين')


@section('vendor-style') 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}"> 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">  
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">  
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
@endsection

@section('page-style') 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}"> 
  <link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}"> 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}"> 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection 
 

@section('content') 


  <!-- users filter start -->
  <div class="card">
    <h5 class="card-header">تصفية النتائج</h5>
    <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2"> 
      <div class="col-md-4 employee_role"></div>
      <div class="col-md-4 employee_plan"></div>
      <div class="col-md-4 employee_status"></div>
    </div>
  </div>
  <!-- users filter end -->

<!-- Basic table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <table class="datatables-basic table">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>id</th>
              <th>الاسم الرباعي</th>
              <th> محل الميلاد</th> 
              <th>النوع</th>
              <th>الحالة الاجتماعية</th>
              <th>الاعدادات </th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
 
 

<!-- Modal new_employee -->
<div class="modal fade text-left" id="new_employee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-secondary" id="myModalLabel17">أضافة بيانات موظف جديد</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">   
          <div class="row">   
            <div class="col-12">
              {{-- <div class="card">  --}}
                {{-- <div class="card-body"> --}}
                  @include('app.employees.modal.add')
                {{-- </div> --}}
              {{-- </div> --}}
            </div> 
          </div> 
        </div> 
    </div>
  </div>
</div> 
<!-- Modal category-->
  
@endsection


@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>  
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>   
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@endsection  


@section('page-script') 
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script> 
  <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script> 
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/z-customJs/employee-datatables.js')) }}"></script>   
  <script src="{{ asset(mix('js/scripts/confirm-delete.js')) }}"></script>  
  <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
@endsection 