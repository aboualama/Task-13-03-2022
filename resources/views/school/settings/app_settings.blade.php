
@extends('layouts/contentLayoutMaster')

@section('title', 'بيانات المدرسة')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">


  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">



@endsection

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
  {{-- <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}"> --}}




@endsection



@section('content')



<div class="card">
  <h5 class="card-header"></h5>
  <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
    <div class="col-md-4 user_status">
      <h5>تاريخ اليوم</h5>
      {{$fulldate}}
    </div>
    <div class="col-md-4 user_status">
      <div class="form-group">
        <label for="status">تعيين عام دراسي افتراضي</label>
        <select class="form-control" name="defaultyear_id" id="defaultyear" >
          <option  value="0">----</option>
          @foreach ($allyears as $year)
            <option value="{{$year->id}}" {{($year->year  == $defaultyear->year) ? 'selected' : '' }}>{{$year->year}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>




<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> {{$setting->name}}</h4>
      </div>
      <div class="card-body">
        <section id="accordion-with-margin">
          <div class="row d-flex">
            <div class="col-md-12 col-12" style="margin: 10px auto;">
              <div class="form-group">
                <img class="img-fluid rounded" src="{{asset('uploads/image/setting/')}}/{{$setting->logo}}" style="max-width: 200px; max-height: 200px; display: block; margin: 0 auto;" />
              </div>
            </div>
          </div>

          <hr style="width:50%">

          <div class="row d-flex">

            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="itemname">أسم المدرسة</label>
                <span class="form-text text-danger" id="name">{{$setting->name}} </span>
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="itemname">مديرة الكلية</label>
                <span class="form-text text-danger" id="name">{{$setting->manger}} </span>
              </div>
            </div>

            <div class="col-md-6 col-6">
              <div class="form-group">
                <label for="itemname">هاتف المدرسة </label>
                <span class="form-text text-danger " id="phone">{{$setting->phone}} </span>
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label for="itemname">جوال المدرسة </label>
                <span class="form-text text-danger " id="phone">{{$setting->cell}} </span>
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="form-group">
                <label for="itemzone">البريد الاليكتروني</label>
                <span class="form-text text-danger " id="phone">{{$setting->email}} </span>
              </div>
            </div>

            <div class="col-md-12 col-12">
              <div class="form-group">
                <label for="itemzone">الرسالة</label>
                <span class="form-text text-danger " id="phone">{!!$setting->message!!} </span>
              </div>
            </div>

            <div class="col-md-12 col-12">
              <div class="form-group">
                <label for="itemzone">الرؤية</label>
                <span class="form-text text-danger " id="phone">{!!$setting->vision!!} </span>
              </div>
            </div>

            <div class="col-md-12 col-12">
              <div class="form-group">
                <label for="itemzone">الاهداف</label>
                <span class="form-text text-danger " id="phone">{!!$setting->goals!!} </span>
              </div>
            </div>

          </div>


          <hr style="width:50%">
          <div class="col-md-1 col-12" style="margin: 10px auto;">
            <div class="form-group">
              <div class="input-group-append" id="button-addon2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#large">
                  <i data-feather="edit" class="mr-25"></i>
                  <span>تعديل</span>
                </button>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>




  <!-- Modal -->
  <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">تعديل   {{$setting->name}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <!-- setting   -->
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">الاعدادات الرئيسية</h4>
                </div>
                <div class="card-body">
                  <form action="#" class="invoice-repeater" id="form" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" id="url" value="/settings">

                    <div class="row d-flex">
                      <div class="media mb-2 col-md-12 col-12">
                        <img src="{{asset('uploads/image/setting/'. $setting->logo)}}" id="users-picture"  alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90">
                        <div class="media-body mt-50">
                          <h4>شعار المدرسة</h4>
                          <div class="col-12 d-flex mt-1 px-0">
                            <label class="btn btn-primary mr-75 mb-0 waves-effect waves-float waves-light" for="change-picture">
                              <span class="d-none d-sm-block">اختار صورة</span>
                              <input class="form-control" type="file" id="change-picture" hidden="" name="logo" accept="image/png, image/jpeg, image/jpg">
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
                    <div class="row d-flex">
                      <div class="col-md-12 col-12">
                        <div class="form-group">
                          <label for="itemname">أسم المدرسة</label>
                          <input type="text" class="form-control" id="itemname" name="name" value="{{$setting->name}}" placeholder="أسم المدرسة" />
                          <span id="name_error" class="form-text text-danger small_error"> </span>
                        </div>
                      </div>

                      <div class="col-md-12 col-12">
                        <div class="form-group">
                          <label for="itemname">مديرة الكلية</label>
                          <input type="text" class="form-control" id="itemname" name="manger" value="{{$setting->manger}}" placeholder="مديرة الكلية" disabled />
                          <span id="manger_error" class="form-text text-danger small_error"> </span>
                        </div>
                      </div>

                      <div class="col-md-6 col-6">
                        <div class="form-group">
                          <label for="itemname">هاتف المدرسة </label>
                          <input type="text" class="form-control" id="itemphone" name="phone" value="{{$setting->phone}}" placeholder="هاتف المدرسة" />
                          <span id="phone_error" class="form-text text-danger small_error"> </span>
                        </div>
                      </div>
                      <div class="col-md-6 col-6">
                        <div class="form-group">
                          <label for="itemname">جوال المدرسة </label>
                          <input type="text" class="form-control" id="itemcell" name="cell" value="{{$setting->cell}}" placeholder="جوال المدرسة " />
                          <span id="cell_error" class="form-text text-danger small_error"> </span>
                        </div>
                      </div>
                      <div class="col-md-12 col-12">
                        <div class="form-group">
                          <label for="itemzone">البريد الاليكتروني</label>
                          <input type="text" class="form-control" id="itememail" name="email" value="{{$setting->email}}" placeholder="البريد الاليكتروني" />
                          <span id="email_error" class="form-text text-danger small_error"> </span>
                        </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">الرسالة</label>
                            <textarea class="form-control CKeditor " id="exampleFormControlTextarea1" name="message" rows="3" placeholder="الرسالة">{{$setting->message}}</textarea>
                            <span id="message_error" class="form-text text-danger small_error"> </span>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <label for="exampleFormControlTextarea2">الرؤية</label>
                            <textarea class="form-control CKeditor " id="exampleFormControlTextarea2" name="vision" rows="3" placeholder="الرؤية">{{$setting->vision}}</textarea>
                            <span id="vision_error" class="form-text text-danger small_error"> </span>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <label for="exampleFormControlTextarea3">الاهداف</label>
                            <textarea class="form-control CKeditor" id="exampleFormControlTextarea3" name="goals" rows="3" placeholder="الاهداف">{{$setting->goals}}</textarea>
                            <span id="message_error" class="form-text text-danger small_error"> </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-12">
                        <button class="btn btn-icon btn-success" id="edit" type="submit">
                          <i data-feather="edit"></i>
                          <span>تعديل</span>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->






@endsection


@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection




@section('page-script')
  <script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
  <script>

  //  set default year
    $('#defaultyear').on('change',function(e) {
      var id = $(this).val();
        $.ajax({
          type:"get",
          url: '/set-default-year/' + id,
          data: { id: id },
          success:function (data) {
            toastr['success'](
                    'تم تعيين العام الدراسي الافتراضي بنجاح ',
                    ' الاعدادات  ' ,
                    {
                      closeButton: true,
                      tapToDismiss: false,
                      positionClass: 'toast-top-right',
                      rtl: 'rtl'
                    }
                  );
            // setInterval(function(){
            //   window.location.reload(1);
            // }, 3000);
          }
        })
    });






  // update setting
    $(document).on('click', '#edit', function (e) {
      e.preventDefault();
      $(".small_error").text('');
      var url = $("#url").val();
      var formData = new FormData($('#form')[0]);

      var id = $("#id").val();
      console.log(id);
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
                        'تم تعديل الاعدادات بنجاح ',
                        ' الاعدادات الرئيسية ' ,
                        {
                          closeButton: true,
                          tapToDismiss: false,
                          positionClass: 'toast-top-right',
                          rtl: 'rtl'
                        }
                      );
                    $("#large").modal('toggle');
              }
          }, error: function (xhr) {

          }
      });
  });


  </script>
   <script>
    // $(".CKeditor").each(function () {
    //     let id = $(this).attr('id');
    //     CKEDITOR.replace(id, {
    //       contentsLangDirection: 'rtl' ,
    //     });
    // });
  </script>

@endsection
