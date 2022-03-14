
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
        <h4 class="card-title">شركة {{$company->name}}</h4>
      </div>
      <div class="card-body">
        <section id="accordion-with-margin">
          <div class="row d-flex"> 
                          
            <div class="col-md-2 col-12">
              <div class="form-group" style=" margin-bottom: 0 !important;">   
                <img class="img-fluid rounded" src="{{asset('uploads/image/company/')}}/{{$company->logo}}" style="max-width: 100px; max-height: 100px; display: block; margin: 0 auto;" /> 
              </div>
            </div>   

            <div class="col-md-2 col-12">
              <div class="form-group">
                <label for="itemname">أسم الشركة</label> 
                <span class="form-text text-danger" id="name">{{$company->name}} </span> 
              </div>
            </div>
            <div class="col-md-2 col-12">
              <div class="form-group">
                <label for="itemname">رقم الهاتف rr</label> 
                <span class="form-text text-danger " id="phone">{{$company->phone}} </span> 
              </div>
            </div>
            <div class="col-md-2 col-12">
              <div class="form-group">
                <label for="itemzone">عدد المناطق</label>
                <span class="form-text text-danger " id="zones">{{$company->zones->count()}} </span> 
              </div>
            </div> 
            <div class="col-md-2 col-12">
              <div class="form-group">
                <label for="itemname">معلومات اضافية</label>
                <span class="form-text text-danger " id="option">{{$company->option}} </span> 
              </div>
            </div> 
            <div class="col-md-1 col-12">
              <div class="form-group"> 
                <div class="input-group-append" id="button-addon2">  
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-primary" onclick="edit({{$company->id}})" data-toggle="modal" data-target="#large">
                    تعديل
                  </button> 
                </div>
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
         <h4 class="modal-title" id="myModalLabel17">تعديل شركة  {{$company->name}}</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div id="myModal" class="modal-body"> 
       </div> 
     </div>
   </div>
  </div> 
   <!-- Modal -->




 



<hr />  




 
@include('alroshd.zone.app-zone-view')
 
 
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
  <script src="{{ asset(mix('js/scripts/z-customJs/company-datatables.js')) }}"></script> 

  <!-- form-repeater -->
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script> 
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
 

  
  <script>
 
  // get edit page in model
 function edit(i , e) {     
            var id = i;   
            $.ajax({ 
                type: 'get', 
                url: '/company/edit/',
                data:{ id: id },
                success: function (data) {
                  $("#myModal").html(data);   
                }
            });
        };

 
  // update company
 $(document).on('click', '#edit', function (e) {
      e.preventDefault();
      $(".small_error").text('');
      var url = $("#url").val();
      var id = $("#id").val();
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
                  // str = key.replace(/./g , "_")
                  $("#" + str + "_error").text(val[0]);
                  console.log(str);
                });
              }else{
                  window.location.href = `/company/view/${id}`; 
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
                  //   $(".form-control").val('');
                  //   $(".user-avatar").val(''); 
                  //   $("#users-picture").attr("src","{{asset('images/logo/img.png')}}");
                  //   $("#large").modal('toggle');
                  //   $("#name").text(data.name); 
                  //   $("#phone").text(data.phone); 
                  //   $("#zones").text(data.zones.length); 
                  //   $("#option").text(data.option);  
              }
          }, error: function (xhr) {

          }
      });
  });
  

   

  </script>
@endsection