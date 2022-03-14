
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
        <h4 class="card-title"> {{$country->country_name}}</h4>
      </div>
      <div class="card-body">
        <section id="accordion-with-margin">
          <div class="row d-flex"> 
                   

            <div class="col-md-2 col-12">
              <div class="form-group">
                <label for="itemname">أسم الدولة</label> 
                <span class="form-text text-danger" id="name">{{$country->country_name}} </span> 
              </div>
            </div>
            <div class="col-md-2 col-12">
              <div class="form-group">
                <label for="itemname">أسم القارة</label>
                <span class="form-text text-danger " id="option">{{$country->continent_name}} </span> 
              </div>
            </div> 
            <div class="col-md-2 col-12">
              <div class="form-group">
                <label for="itemname">رمز الهاتف </label> 
                <span class="form-text text-danger " id="phone">{{$country->phone_code}} </span> 
              </div>
            </div>
            <div class="col-md-2 col-12">
              <div class="form-group">
                <label for="itemzone">الرمز  </label>
                <span class="form-text text-danger " id="zones">{{$country->country_code}} </span> 
              </div>
            </div> 
            <div class="col-md-2 col-12">
              <div class="form-group">
                <label for="itemname">معلومات اضافية</label>
                <span class="form-text text-danger " id="option">{{$country->option}} </span> 
              </div>
            </div> 
            <div class="col-md-1 col-12">
              <div class="form-group"> 
                <div class="input-group-append" id="button-addon2">  
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-primary" onclick="edit({{$country->id}})" data-toggle="modal" data-target="#large">
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
         <h4 class="modal-title" id="myModalLabel17">   {{$country->country_name}}</h4>
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




  
 
@endsection


@section('vendor-script') 

  
  <!-- toastr -->
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script> 
  <script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
 
@endsection 

 


@section('page-script')  
 

  
  <script>
 
  // get edit page in model
 function edit(i , e) {     
            var id = i;   
            $.ajax({ 
                type: 'get', 
                url: '/country/edit/',
                data:{ id: id },
                success: function (data) {
                  $("#myModal").html(data);   
                }
            });
        };

 
  // update country
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
                  window.location.href = `/country/view/${id}`; 
                  // toastr['success'](
                  //       'تم اضافة الشركة بنجاح واضافة عدد تقسيم المناطق',
                  //       ' شركات الشحن ' ,
                  //       {
                  //         closeButton: true,
                  //         tapToDismiss: false, 
                  //         positionClass: 'toast-top-right',
                  //         rtl: 'rtl'
                  //       }
                  //     ); 
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