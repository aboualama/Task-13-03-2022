
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
                            <div class="divider divider-left divider-warning">
                              <div class="divider-text text-warning">المراحل الدراسية</div>
                            </div>   
                        </div>
                      </div>
                    </section> 
                  </div>    
                  <div class="row"> 
                    @foreach ($stages as $stage)  
                      <div class="col-md-12  confirmrow_{{$stage->id}}" > 
                        <div class="row">  
                          <div class="col-md-6">
                            <div class="form-group"> 
                              {{$stage->name}} 
                            </div>
                          </div>
                          <div class="col-md-6" >
                            <div class=" ">
                              <button type="trash"  class="btn btn-sm confirm" onclick="confirmrow({{$stage->id}})" data-route='stage' data-a_name='المراحلة الدراسية  '>  
                                <i data-feather='trash-2'></i>
                              </button> 
                            </div> 
                          </div> 
                        </div>
                      </div> 
                    @endforeach 
                  </div>  
                  <div >
                    <button type="submit" class="btn btn-warning btn-block waves-effect waves-float waves-light" data-toggle="modal" data-target="#stage"> اضافة مرحلة </button> 
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
                            <div class="divider divider-left divider-info">
                              <div class="divider-text text-info">الفصول الدراسية</div>
                            </div>   
                        </div>
                      </div>
                    </section>  
                  </div>   
                  <div class="form-group"> 
                    @foreach ($stages as $stage)  
                      <div class="form-group confirmparent_{{$stage->id}}">    
                          <p class="text-danger">{{$stage->name}}</p>    
                          <div class="row">
                            @forelse ($stage->classrooms as $classroom) 
                              <div class="col-md-6 confirmrow2_{{$classroom->id}}"> 
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class=" ">
                                      <p>
                                        -- {{$classroom->classroom}} 
                                      </p> 
                                    </div> 
                                  </div>  
                                  <div class="col-md-6">
                                    <div class=" ">
                                      <button classroom="trash"  class="btn btn-sm confirm2" onclick="confirmrow2({{$classroom->id}})" data-route='classroom' data-a_name='الفصل الدراسي'>  
                                        <i data-feather='trash-2'></i>
                                      </button> 
                                    </div> 
                                  </div> 
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
                    <button type="submit"  class="btn btn-info btn-block waves-effect waves-float waves-light" data-toggle="modal" data-target="#classroom">اضافة صف دراسي </button> 
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
 
 
  

<!-- Modal stage -->
<div class="modal fade text-left" id="stage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-warning" id="myModalLabel17">أضافة مرحلة دراسية</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">   
          <div class="row">   
            <div class="col-12">
              <div class="card"> 
                <div class="card-body">
                  <form action="#" class="invoice-repeater" id="form_stage"> 
                    <input type="hidden" id="url" value="/stages">   
                      <div class="row d-flex">     
                        <div class="col-md-12 col-12">
                          <div class="form-group"> 
                          <label for="status2" class="text-warning"> الاسم</label>
                            <input type="text" class="form-control" name="name" value="" placeholder="مثال: المرحلة الابتدائية" required/>
                            <span id="name_error" class="form-text text-warning small_error"> </span> 
                          </div>
                        </div>   
                      </div>   
                    <hr /> 
                    <div class="row">
                      <div class="col-12">  
                        <button class="btn btn-icon btn-warning" id="stage_submit" type="submit"> 
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
<!-- Modal stage-->

<!-- Modal classroom -->
<div class="modal fade text-left" id="classroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-info" id="myModalLabel17">أضافة مرحلة دراسية</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">   
          <div class="row">   
            <div class="col-12">
              <div class="card"> 
                <div class="card-body">
                  <form action="#" class="invoice-repeater" id="form_classroom" > 
                    <input type="hidden" id="classrooms_url" value="/classrooms">   
                      <div class="row d-flex">      
                      <div class="col-md-12 col-12">
                        <div class="form-group">
                          <label for="status2" class="text-info">المرحلة الدراسية</label>
                          <select class="form-control" name="stage_id" > 
                            @foreach ($stages as $stage)  
                              <option value="{{$stage->id}}">{{$stage->name}}</option> 
                            @endforeach
                          </select>
                        </div> 
                      </div>     
                      <div class="col-md-12 col-12">
                        <div class="form-group"> 
                        <label for="status3" class="text-info">الصف الدراسي</label>
                          <input type="text" class="form-control" name="classroom" value="" placeholder="مثال:  الصف الاول الابتدائي" />
                          <span id="classroom_error" class="form-text text-info small_error"> </span> 
                        </div>
                      </div>    
                      
                      </div>   
                    <hr /> 
                    <div class="row">
                      <div class="col-12">  
                        <button class="btn btn-icon btn-info" id="classroom_submit" type="submit"> 
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
<!-- Modal classroom -->
 

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
 
    $(document).on('click', '#stage_submit', function (e) {
        e.preventDefault();
        $(".small_error").text('');
        var url = $("#url").val(); 
        var formData = new FormData($('#form_stage')[0]); 
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
                    $("#modal-block").modal('toggle'); 
                    toastr['success'](
                          'تم اضافة مرحلة دراسية بنجاح ',
                          ' المراحل الدراسية ' ,
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

    $(document).on('click', '#classroom_submit', function (e) {
        e.preventDefault();
        $(".small_error").text('');
        var url = $("#classrooms_url").val(); 
        var formData = new FormData($('#form_classroom')[0]); 
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
                    $("#modal-block").modal('toggle'); 
                    toastr['success'](
                          'تم اضافة فصل دراسي بنجاح ',
                          ' الفصول الدراسية ' ,
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
 