
@extends('layouts/contentLayoutMaster')

@section('title', 'قائمة الاعضاء')

@section('vendor-style')
  {{-- vendor css files --}} 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}"> 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

  
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files --> 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">  
@endsection


@section('content')
<div class="row">
  <!-- Company repeater -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">أضافة دولة</h4>
      </div>
      <div class="card-body">
        <form action="#" class="invoice-repeater" id="form" enctype="multipart/form-data">
          @csrf  

          
          <input type="hidden" id="url" value="/country">
 
          {{-- <div class="row d-flex align-items-end">  --}}
          <div class="row d-flex"> 
   
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="itemname">أسم الدولة</label>
                    <input type="text" class="form-control" name="country_name" placeholder=" مصر" />
                    <span id="country_name_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="itemzone">  اسم القارة</label>
                    <input type="text" class="form-control" name="continent_name" placeholder="افريقيا" />
                    <span id="continent_name_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 


                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="itemzone">الرمز </label>
                    <input type="text" class="form-control" name="country_code" placeholder=" Eg" />
                    <span id="country_code_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="itemzone">رمز الهاتف</label>
                    <input type="number" class="form-control" name="phone_code" placeholder="002" />
                    <span id="phone_code_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 


                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="itemoption">معلومات اضافية</label>
                    <input type="text" class="form-control" id="itemoption" name="option" placeholder="معلومات اضافية" />
                    <span id="option_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 


                
              </div> 
              <hr /> 
          <div class="row">
            <div class="col-12">  
              <button class="btn btn-icon btn-primary" id="submit" type="submit">
                <i data-feather="plus" class="mr-25"></i>
                <span>حقظ</span>
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- /Company repeater -->
</div>

 
 
 
@endsection


@section('vendor-script')
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
  <script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
@endsection
@section('page-script') 
 
 
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
                    // window.location.href = "/en/question"; 
                    toastr['success'](
                          'تم اضافة الدولة بنجاح',
                          ' الدول ' ,
                          {
                            closeButton: true,
                            tapToDismiss: false, 
                            positionClass: 'toast-top-right',
                            rtl: 'rtl'
                          }
                        ); 
                      $(".form-control").val('');
                      $(".user-avatar").val(''); 
                      $("#users-picture").attr("src","{{asset('images/logo/img.png')}}");
                }
            }, error: function (xhr) {

            }
        });
    });


 
  </script>
@endsection