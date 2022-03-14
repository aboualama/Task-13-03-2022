
@extends('layouts/contentLayoutMaster')

@section('title', 'قائمة الاعضاء')
  

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}"> 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">  

  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style') 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}"> 
  <link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}"> 
@endsection 

@section('content')
<div class="row">
  <div class="col-12">
    {{-- <p>Read full documnetation <a href="https://datatables.net/" target="_blank">here</a></p> --}}
  </div>
</div>

  <!-- users filter start -->
  <div class="card">
    <h5 class="card-header">اختار الحالة</h5>
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
              <th>البريد الإلكتروني</th> 
              <th>الوظيفة</th>
              <th>الحالة</th>
              <th>حذف </th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>








  <!-- Modal to add new record -->
  <div class="modal modal-slide-in fade" id="modals-slide-in">
    <div class="modal-dialog sidebar-sm">
      <form id="form" class="add-new-record modal-content pt-0" >
        @csrf
        <input type="hidden" id="url" value="{{ route('user-store') }}"/>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">تسجيل مستخدم جديد</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <h4 class="modal-title text-center mb-1 mt-1"> تسجيل البيانات الاساسية</h4>
          <div class="form-group">
            <label class="form-label" for="name">الاسم</label>
            <input type="text" name="name" class="form-control dt-full-name" id="name"
              placeholder="John Doe" aria-label="John Doe" />
            <small id="name_error" class="form-text text-danger center small_error"> </small>
          </div>
          <div class="form-group">
            <label class="form-label" for="phone">رقم التليفون</label>
            <input type="text" name="phone" id="phone" class="form-control dt-post"
              placeholder="0123456789" aria-label="0123456789" />
            <small id="phone_error" class="form-text text-danger center small_error"> </small>
          </div>
          <div class="form-group">
            <label class="form-label" for="email">البريد الاليكتروني</label>
            <input type="email" name="email" id="email" class="form-control dt-email"
              placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
            <small id="email_error" class="form-text text-danger center small_error"> </small>
           </div>
          {{--  
              <div class="form-group">
                <label for="register-password" class="form-label">Password</label>

                <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                  <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="register-password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />
                  <div class="input-group-append">
                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                  </div>
                </div>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="register-password-confirm" class="form-label">Confirm Password</label>

                <div class="input-group input-group-merge form-password-toggle">
                  <input type="password" class="form-control form-control-merge" id="register-password-confirm" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />
                  <div class="input-group-append">
                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                  </div>
                </div>
              </div> --}}

          <h6 class="modal-title text-center mb-1 mt-5">  سيتم ارسال كلمة مرور عبر  البريد  الاليكتروني    </h6>
          <h6 class="modal-title text-center mb-5">  الحالة الافتراضية : غير مفعل    </h6>
          <button type="submit" id="submit" class="btn btn-primary data-submit mr-1">تسجيل</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">إلغاء</button>
        </div>
      </form>
    </div>
  </div>



{{-- edit Modal --}}
<div class="col-12">
    <div class="row">
      <div class="modal-size-lg mr-1 mb-1 d-inline-block">
        <div class="modal fade text-left" id="edit-modal" tabindex="-1" role="dialog"
          aria-labelledby="myModalLabel17" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row">   
                  <div class="col-12">
                    <div class="card"> 
                      <div class="card-body">
                        <div id="edit-data"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 

  
</section>
<!--/ Basic table -->
 

 
 
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

  
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>  
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>   
  <script src="{{ asset(mix('js/scripts/confirm-delete.js')) }}"></script>

@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/z-customJs/user-datatables.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>

 
  <script>
 

    $(document).on('click', '#submit', function (e) {
            e.preventDefault();
            $(".small_error").text('');
            var url      = $("#url").val();
            var formData = new FormData($('#form')[0]);  
        $.ajax({
            type       : 'POST',
            url        : url,
            data       : formData,
            processData: false,
            contentType: false,
            cache      : false,
            success    : function (data) { 

              if (data.status == 442){
                $.each(data.errors, function (key, val) {
                  var newchar = '_'
                  var str     = key.split('.').join(newchar);  
                  $("#" + str + "_error").text(val[0]);
                  console.log(str);
                });
              }else{
                  $("#modals-slide-in").modal('toggle');  
                  $("#name, #email, #phone").val("")
                    toastr['success'](
                          ' حالة المستخدم بحاجه الي تفعيل' ,
                          'تم اضافة  مستخدم جديد بنجاح',
                          {
                            closeButton: true,
                            tapToDismiss: false, 
                            positionClass: 'toast-top-right',
                            rtl: 'rtl'
                          }
                        ); 
              } 
   
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
  });









  $('.action-edit').on("click", function (e) {
    e.stopPropagation();
    var id = $(this).data("id"); 
    var route = $(this).data("route"); 
    $.ajax({
        type: 'GET',
        url: route + '/' + id +'/edit',
        success: function (data) {
        $('#edit-modal').modal('toggle');
        $('#edit-data').html(data);
        }
    });
});
 












  </script>
@endsection 
 
 