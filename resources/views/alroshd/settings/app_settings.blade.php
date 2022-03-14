
@extends('layouts/contentLayoutMaster')

@section('title', 'قائمة المناطق')

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
<div class="row">
  <div class="col-12">
    <div class="card"> 
      <div class="card-header">
        <h4 class="card-title">شركة {{$record->name}}</h4>
      </div>
      <div class="card-body">
        <section id="accordion-with-margin">
          <div class="row d-flex">  
            <div class="col-md-2 col-2" style="margin: 10px auto;">
              <div class="form-group">   
                <img class="img-fluid rounded" src="{{asset('uploads/image/setting/')}}/{{$record->logo}}" style="max-width: 200px; max-height: 200px; display: block; margin: 0 auto;" /> 
              </div>
            </div>   
          </div>  

          <hr style="width:50%"> 

          <div class="row d-flex">  

            <div class="col-md-12 col-12">
              <div class="form-group">
                <label for="itemname">أسم الشركة</label> 
                <span class="form-text text-danger" id="name">{{$record->name}} </span> 
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="form-group">
                <label for="itemname">وصف مختصر</label>
                <span class="form-text text-danger " id="option">{{$record->description}} </span> 
              </div>
            </div> 
            <div class="col-md-4 col-4">
              <div class="form-group">
                <label for="itemname">رقم الهاتف </label> 
                <span class="form-text text-danger " id="phone">{{$record->phone}} </span> 
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="form-group">
                <label for="itemname">رقم الفاكس </label> 
                <span class="form-text text-danger " id="phone">{{$record->fax}} </span> 
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="form-group">
                <label for="itemname">رقم الواتس </label> 
                <span class="form-text text-danger " id="phone">{{$record->cell}} </span> 
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="form-group">
                <label for="itemzone">البريد الاليكتروني</label> 
                <span class="form-text text-danger " id="phone">{{$record->email}} </span> 
              </div>
            </div> 
            <div class="col-md-12 col-12">
              <div class="form-group">
                <label for="itemzone">العنوان</label> 
                <span class="form-text text-danger " id="phone">{{$record->address}} </span> 
              </div>
            </div> 

            <div class="col-md-12"  style="border: 1px solid #ccc; margin: 5px auto; max-width: 99%;">
              <div class="row">
                <div class="col-md-4 col-4">
                  <div class="form-group">
                    <label for="itemzone">نسبة الضريبة</label> 
                    <span class="form-text text-danger " id="phone">{{$record->tax_percent}} </span> 
                  </div>
                </div> 
                <div class="col-md-4 col-4">
                  <div class="form-group">
                    <label for="itemzone">مبلغ الضريبه</label> 
                    <span class="form-text text-danger " id="phone">{{$record->tax_amount}} </span> 
                  </div>
                </div> 
                <div class="col-md-4 col-4">
                  <div class="form-group">
                    <label for="itemzone">الخصم الاجمالي</label> 
                    <span class="form-text text-danger " id="phone">{{$record->discount}} </span> 
                  </div>
                </div> 
              </div> 
            </div> 
          </div>  


          
      
          <hr style="width:50%"> 

      <div class="col-md-1 col-12" style="margin: 10px auto;">
        <div class="form-group"> 
          <div class="input-group-append" id="button-addon2">  
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-block btn-outline-primary" onclick="edit({{$record->id}})" data-toggle="modal" data-target="#large"> 
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
         <h4 class="modal-title" id="myModalLabel17">تعديل   {{$record->name}}</h4>
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
                        <img src="{{asset('uploads/image/setting/'. $record->logo)}}" id="users-picture"  alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90">
                        <div class="media-body mt-50">
                          <h4>شعار الشركة</h4>
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
                            <label for="itemname">أسم الشركة</label>
                            <input type="text" class="form-control" id="itemname" name="name" value="{{$record->name}}" placeholder="أسم الشركة" />
                            <span id="name_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>
                        <div class="col-md-12 col-12">
                          <div class="form-group">
                            <label for="itemname">وصف مختصر</label> 
                            <input type="text" class="form-control" id="itemdescription" name="description" value="{{$record->description}}" placeholder="وصف مختصر" />
                            <span id="description_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div> 
                        <div class="col-md-4 col-4">
                          <div class="form-group">
                            <label for="itemname">رقم الهاتف </label>  
                            <input type="text" class="form-control" id="itemphone" name="phone" value="{{$record->phone}}" placeholder="رقم الهاتف" />
                            <span id="phone_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>
                        <div class="col-md-4 col-4">
                          <div class="form-group">
                            <label for="itemname">رقم الفاكس </label>  
                            <input type="text" class="form-control" id="itemfax" name="fax" value="{{$record->fax}}" placeholder="رقم الفاكس " />
                            <span id="fax_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>
                        <div class="col-md-4 col-4">
                          <div class="form-group">
                            <label for="itemname">رقم الواتس </label>  
                            <input type="text" class="form-control" id="itemcell" name="cell" value="{{$record->cell}}" placeholder="رقم الواتس " />
                            <span id="cell_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>
                        <div class="col-md-12 col-12">
                          <div class="form-group">
                            <label for="itemzone">البريد الاليكتروني</label>  
                            <input type="text" class="form-control" id="itememail" name="email" value="{{$record->email}}" placeholder="البريد الاليكتروني" />
                            <span id="email_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div> 
                        <div class="col-md-12 col-12">
                          <div class="form-group">
                            <label for="itemzone">العنوان</label>  
                            <input type="text" class="form-control" id="itemaddress" name="address" value="{{$record->address}}" placeholder="العنوان" />
                            <span id="address_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div> 
             
                        <div class="col-md-4 col-4">
                          <div class="form-group">
                            <label for="itemzone">نسبة الضريبة</label>  
                            <input type="text" class="form-control" id="itemtax_percent" name="tax_percent" value="{{$record->tax_percent}}" placeholder="نسبة الضريبة" />
                            <span id="tax_percent_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div> 
                        <div class="col-md-4 col-4">
                          <div class="form-group">
                            <label for="itemzone">مبلغ الضريبه</label>  
                            <input type="text" class="form-control" id="itemtax_amount" name="tax_amount" value="{{$record->tax_amount}}" placeholder="مبلغ الضريبه" />
                            <span id="tax_amount_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div> 
                        <div class="col-md-4 col-4">
                          <div class="form-group">
                            <label for="itemzone">الخصم الاجمالي</label>  
                            <input type="text" class="form-control" id="itemdiscount" name="discount" value="{{$record->discount}}" placeholder="الخصم الاجمالي" />
                            <span id="discount_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>  
                      </div>  
       
                    </div> 
                    <hr /> 
                    <div class="row">
                      <div class="col-12">  
                        <button class="btn btn-icon btn-success" id="edit" type="submit">
                          <i data-feather="edit" class="mr-25"></i>
                          <span>تعديل</span>
                        </button>
                      </div>
                    </div>
          
                  </form>
                </div>
              </div>
            </div>
            <!-- /Setting  -->
          </div> 
        </div> 
     </div>
   </div>
  </div> 
   <!-- Modal -->




 
 
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
  <!-- form-repeater -->
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

  <script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
 
@endsection 

 


@section('page-script')
  {{-- Page js files --}} 

  <!-- form-repeater -->
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script> 
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
 

  
  <script>
  
  // update record
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
                    // $(".form-control").val('');
                    // $(".user-avatar").val(''); 
                    // $("#users-picture").attr("src","{{asset('images/logo/img.png')}}");
                    $("#large").modal('toggle');
                    // $("#name").text(data.name); 
                    // $("#phone").text(data.phone); 
                    // $("#zones").text(data.zones.length); 
                    // $("#option").text(data.option);  
              }
          }, error: function (xhr) {

          }
      });
  });
  
 
  </script>
@endsection