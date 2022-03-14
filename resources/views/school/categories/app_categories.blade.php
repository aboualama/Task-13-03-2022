
@extends('layouts/contentLayoutMaster')

@section('title', 'بيانات المدرسة')


@section('vendor-style') 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}"> 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">  
@endsection

@section('page-style') 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}"> 
  <link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}"> 
@endsection 
 

@section('content') 

   
<div class="row">
  <div class="col-md-12">
    <section class="app-user-edit">
      <div class="card">
        <div class="card-body"> 
          <div class="tab-content"> 
            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel"> 
              <div class="row"> 
                <div class="col-md-12"  id="section_inputs">   
                  <div class="row"> 
                    <section id="divider-text-position" style="width: 98%; margin: auto;">
                      <div class="row">
                        <div class="col-md-12"> 
                            <div class="divider divider-left divider-secondary">
                              <div class="divider-text text-secondary">أقسام العهدة</div>
                            </div>   
                        </div>
                      </div>
                    </section> 
                  </div>    
                  <div class="row"> 
                    @foreach ($categories as $category)   
                      <div class="col-md-6">
                        <div class="form-group"> 
                          {{$category->name}} 
                        </div>
                      </div>  
                    @endforeach 
                  </div>  
                  <div >
                    <button type="submit" class="btn btn-secondary btn-block waves-effect waves-float waves-light" data-toggle="modal" data-target="#category">  اضافة قسم جديد </button> 
                  </div> 
                </div>   
              </div>  
            </div>  
          </div>
        </div>
      </div>
    </section> 
  </div>
 
  <div class="col-md-12">
    <section class="app-user-edit">
      <div class="card">
        <div class="card-body"> 
          <div class="tab-content"> 
            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel"> 
              <div class="row"> 
                <div class="col-md-12"  id="section_inputs">   
                  <div class="row"> 
                    <section id="divider-text-position" style="width: 98%; margin: auto;">
                      <div class="row">
                        <div class="col-md-12"> 
                            <div class="divider divider-left divider-success">
                              <div class="divider-text text-success">أنواع العهدة</div>
                            </div>   
                        </div>
                      </div>
                    </section>  
                  </div>     
                  <div class="form-group"> 
                    @foreach ($categories as $category)  
                      <div class="form-group">   
                          <p class="text-danger">{{$category->name}}</p>    
                          <div class="row">
                            @forelse ($category->types as $type)  
                              <div class="col-md-6">
                                <div class=" ">
                                  <p>
                                    -- {{$type->name}} 
                                  </p> 
                                </div> 
                              </div>    
                            @empty 
                              -------
                            @endforelse    
                          </div> 
                      </div>  
                    @endforeach
                  </div>  
                  <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                    <button type="submit"  class="btn btn-success btn-block waves-effect waves-float waves-light" data-toggle="modal" data-target="#type">اضافة نوع جديد </button> 
                  </div> 
                </div>   
              </div>  
            </div>  
          </div>
        </div>
      </div>
    </section> 
  </div>  
</div>
 
 
 

<!-- Modal category -->
<div class="modal fade text-left" id="category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-secondary" id="myModalLabel17">أضافة قسم جديد</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">   
          <div class="row">   
            <div class="col-12">
              <div class="card"> 
                <div class="card-body">
                  <form action="#" class="invoice-repeater" id="form_category"> 
                    <input type="hidden" id="url" value="/categories">   
                      <div class="row d-flex">     
                        <div class="col-md-12 col-12">
                          <div class="form-group"> 
                          <label for="status2" class="text-secondary"> الاسم</label>
                            <input type="text" class="form-control" name="name" value="" placeholder="مثال: العهدة المستديمة " required/>
                            <span id="name_error" class="form-text text-secondary small_error"> </span> 
                          </div>
                        </div>   
                      </div>   
                    <hr /> 
                    <div class="row">
                      <div class="col-12">  
                        <button class="btn btn-icon btn-secondary" id="category_submit" type="submit"> 
                        <i data-feather="plus"></i>
                          <span>اضافة</span>
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
<!-- Modal category-->

 <!-- Modal type -->
<div class="modal fade text-left" id="type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-success" id="myModalLabel17">أضافة نوع جديد </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">   
        <div class="row">   
          <div class="col-12">
            <div class="card"> 
              <div class="card-body">
                <form action="#" class="invoice-repeater" id="form_type" > 
                  <input type="hidden" id="types_url" value="/types">   
                    <div class="row d-flex">      
                      <div class="col-md-12 col-12">
                        <div class="form-group">
                        <label for="status2" class="text-success">أقسام العهدة </label>
                        <select class="form-control" name="category_id" required> 
                          @foreach ($categories as $category)  
                            <option value="{{$category->id}}">{{$category->name}}</option> 
                          @endforeach
                        </select>
                      </div> 
                      </div>     
                      <div class="col-md-12 col-12">
                      <div class="form-group"> 
                        <label for="status3" class="text-success">الاسم </label>
                        <input type="text" class="form-control" name="name" value="" placeholder="مثال: الكتب الدراسية "required />
                        <span id="type_error" class="form-text text-success small_error"> </span> 
                      </div>
                      </div>    
                      
                    </div>   
                  <hr /> 
                  <div class="row">
                    <div class="col-12">  
                      <button class="btn btn-icon btn-success" id="type_submit" type="submit"> 
                        <i data-feather="plus"></i>
                        <span>اضافة</span>
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
<!-- Modal type -->
 
@endsection


@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>  
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>   
  <script src="{{ asset(mix('js/scripts/confirm-delete.js')) }}"></script> 
@endsection  


@section('page-script') 
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
  
  <script> 
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    
    $(document).on('click', '#category_submit', function (e) {
        e.preventDefault();
        $(".small_error").text('');
        var url = $("#url").val(); 
        var formData = new FormData($('#form_category')[0]); 
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
                    $("#category").modal('toggle'); 
                    toastr['success'](
                          'تم اضافة قسم جديد بنجاح ',
                          ' أقسام العهدة  ' ,
                          {
                            closeButton: true,
                            tapToDismiss: false, 
                            positionClass: 'toast-top-right',
                            rtl: 'rtl'
                          }
                        );    
                    setInterval(function(){
                      window.location.reload(1);
                    }, 3000);
                }
            }, error: function (xhr) {

            }
        });
    });
    
    
    $(document).on('click', '#type_submit', function (e) {
        e.preventDefault();
        $(".small_error").text('');
        var url = $("#types_url").val(); 
        var formData = new FormData($('#form_type')[0]); 
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
                    $("#type").modal('toggle'); 
                    toastr['success'](
                          'تم اضافة نوع جديد بنجاح ',
                          ' انواع العهدة  ' ,
                          {
                            closeButton: true,
                            tapToDismiss: false, 
                            positionClass: 'toast-top-right',
                            rtl: 'rtl'
                          }
                        );    
                    setInterval(function(){
                      window.location.reload(1);
                    }, 3000);
                }
            }, error: function (xhr) {

            }
        });
    }); 
  
  </script>   

@endsection
 