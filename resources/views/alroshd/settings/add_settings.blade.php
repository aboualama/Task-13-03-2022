
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
        <h4 class="card-title">الاعدادات</h4>
      </div>
      <div class="card-body">
        <form action="#" class="invoice-repeater" id="form" enctype="multipart/form-data">
          @csrf 
          <input type="hidden" id="url" value="/settings">
  
          <div class="row d-flex">  
            <div class="media mb-2 col-md-12 col-12">
              <img src="{{asset('images/logo/logo.png')}}" id="users-picture"  alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90">
              <div class="media-body mt-50">
                <h4>شعار الشركة</h4>
                <div class="col-12 d-flex mt-1 px-0">
                  <label class="btn btn-primary mr-75 mb-0 waves-effect waves-float waves-light" for="change-picture">
                    <span class="d-none d-sm-block">اختار صورة</span>
                    <input class="form-control" type="file" id="change-picture" hidden="" name="image" accept="image/png, image/jpeg, image/jpg">
                    <span class="d-block d-sm-none">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mr-0"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </span>
                  </label>
                  <button class="btn btn-outline-secondary d-none d-sm-block waves-effect">حذف</button>
                  <button class="btn btn-outline-secondary d-block d-sm-none waves-effect">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-0"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                  </button>
                </div>
                <span id="image_error" class="form-text text-danger small_error"> </span> 
              </div>
            </div>
 
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="itemname">أسم الشركة</label>
                    <input type="text" class="form-control" id="itemname" name="name" placeholder="أسم الشركة" />
                    <span id="name_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="itemzone">عدد المناطق</label>
                    <input type="number" class="form-control" id="itemzone" name="zone" placeholder="عدد المناطق" />
                    <span id="zone_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="itemzone">رقم الهاتف</label>
                    <input type="number" class="form-control" id="itemzone" name="phone" placeholder="0123456789" />
                    <span id="phone_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 

                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="itemname">معلومات اضافية</label>
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
                          'تم اضافة الشركة بنجاح واضافة عدد تقسيم المناطق',
                          ' شركات الشحن ' ,
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