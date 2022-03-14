
@extends('layouts/contentLayoutMaster')

@section('title', 'قائمة الاعضاء')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files --> 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}"> 
  <link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}">
@endsection

 

@section('content')
 

  <!-- users filter start -->
  <div class="card">
    <h5 class="card-header">فلترة النتائج </h5>
    <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2"> 
      <div class="col-md-4 user_status"></div>
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
              <th>الاسم</th>
              <th>رقم الهاتف</th> 
              <th>عدد المناطق</th> 
              <th>معلومات اضافية</th> 
              <th>الاعدادات</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div> 
</section>
<!--/ Basic table -->
 
 
@endsection


@section('vendor-script')


  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
  {{-- vendor files --}}
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
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  

  
  <!-- toastr -->
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <!-- form-repeater -->
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/confirm-delete.js')) }}"></script>
@endsection

@section('page-script')

<script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/z-customJs/company-datatables.js')) }}"></script> 

  <!-- form-repeater -->
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>



 


  
  <script>
 



 $(document).on('click', '#submit', function (e) {
            e.preventDefault();
            $(".small_error").text('');
            var url = $("#url").val();
            var formData = new FormData($('#form')[0]);

            console.log('formData');
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
                        // str = key.replace(/./g , "_")
                        $("#" + str + "_error").text(val[0]);
                        console.log(str);
                      });
                    }else{
                        toastr['success'](
                              'تم اضافة الشركة بنجاح واضافة عدد تقسيم المناطق',
                              ' شركات الشحن ' ,
                              {
                                closeButton: true,
                                tapToDismiss: false, 
                                positionClass: 'toast-top-right',
                                rtl: 'rtl'
                              }
                            ); 
                    }
                }, error: function (xhr) {

                }
            });
        });




 
 

  </script>
@endsection