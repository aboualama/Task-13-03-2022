@extends('layouts/contentLayoutMaster')

@section('title', 'User Edit')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}"> 
  
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">  
@endsection
 

@section('content')
<!-- users edit start -->
    <section class="app-user-edit">


        <form id="section_form" class="form-validate" >
    
        <div class="col-md-12">
            <div class="form-group">
            <label for="status">اسم الشركة</label>
            <select class="form-control" name="company_id" id="company">
                <option  value="0">اختار الشركة</option>
                @foreach ($companies as $company) 
                <option value="{{$company->id}}">{{$company->name}}</option> 
                @endforeach
            </select>
            </div> 
        </div>  <div class="col-md-12" style="display: none" id="section_inputs"> 

            {{-- Dirction row --}}
            <div class="row"> 
            <section id="divider-text-position" style="width: 98%;margin: auto;">
                <div class="row">
                <div class="col-md-12"> 
                    <div class="divider divider-left divider-primary">
                        <div class="divider-text text-primary">اختار اتجاه الشحنة</div>
                    </div>   
                </div>
                </div>
            </section>
            <div class="col-md-6">
                <div class="form-group">
                <label for="role">من:</label>
                <select class="form-control" name="from" id="form"> 
                    <option >اختار المنطقة</option>
                </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="role">إلي:</label>
                <select class="form-control" name="to" id="to"> 
                    <option >اختار المنطقة</option>
                </select>
                </div>
            </div>
            </div>
            {{-- end Dirction row --}}
            






            {{-- weight row --}}
            <div class="row"> 
            <section id="divider-text-position" style="width: 98%; margin: auto;">
                <div class="row">
                <div class="col-md-12"> 
                    <div class="divider divider-left divider-danger">
                        <div class="divider-text text-danger">وزن الشحنه</div>
                    </div>   
                </div>
                </div>
            </section> 
            {{-- <section class="form-control-repeater" style="width: 100%;"> --}}
            

                <div class="col-md-12">
                    <div class="form-group">
                    <label for="role">وزن الشحنه:</label>
                    <select class="form-control" name="weight" id="weight"> 
                        <option >اختار وزن </option>
                    </select>
                    </div>
                </div>


            {{-- </section>   --}}
            </div>
            {{-- end weight row --}} 

            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
            <button type="submit" id="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">طلب السعر</button>
            <button type="reset" id="reset" class="btn btn-outline-secondary">اعادة</button>
            </div>
            
        </div>

        </form>




















           <!-- Modal -->
  <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17"> </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div id="myModal" class="modal-body"> 
            <h1>سعر الشحن </h1> 
            <h2><span id="price"> </span> </h2>
          </div> 
      </div>
    </div>
   </div> 
    <!-- Modal -->

    </section>
<!-- users edit ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

  
  <!-- repeater -->
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
  <!-- toastr -->
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script> 
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>

 

  <script type="text/javascript"> 

        $('#reset').on('click',function(e) {  
            $('#section_inputs').fadeOut();  
        }); 
 

      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

      $('#company').on('change',function(e) {
          var id = e.target.value;

          if (id == 0){
            $('#section_inputs').fadeOut(); 

          }else{

            $('#section_inputs').fadeIn(); 
            $.ajax({
              url:"{{ route('get-zone-weight') }}",
              type:"get",
              data: {
              id: id
              },
              success:function (data) {  
 
                $('#weight').empty(); 
                $.each(data.weight,function(index,weight){ 
                        $('#weight').append('<option value="'+weight+'">' + weight +'  كليو جرام </option>');  
                }) 

                $('#form').empty(); 
                $.each(data.data,function(index,zone){
                    $.each(zone.countries, function( i, country ) { 
                        $('#form').append('<option value="'+zone.num+'"> ' + country.country_name +'</option>'); 
                    }) 
                }) 

                $('#to').empty();
                $.each(data.data,function(index,zone){
                    $.each(zone.countries, function( i, country ) { 
                        $('#to').append('<option value="'+zone.num+'"> ' + country.country_name +'</option>'); 
                    }) 
                })
 

              }
            })

          }
        }); 

  

        $(document).on('click', '#submit', function (e) {
            e.preventDefault();
            $(".small_error").text(''); 
            var formData = new FormData($('#section_form')[0]);

            console.log(formData);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: 'test',
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
                        console.log(str);
                      });
                    }else{ 

                      
                        $("#large").modal('toggle');
                        $("#price").text(data);
                        toastr['success'](
                              'تم عرض السعر بنجاح ',
                              '   أسعار الشحن ' ,
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
 