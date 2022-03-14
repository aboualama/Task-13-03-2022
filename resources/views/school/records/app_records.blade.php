
@extends('layouts/contentLayoutMaster')

@section('title', 'السجلات المدرسية')

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
    
    {{-- record  --}}
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
                              <div class="divider divider-left divider-danger">
                                <div class="divider-text text-danger">   السجلات المدرسية</div>
                              </div>   
                          </div>
                        </div>
                      </section> 
                    </div>   
                    <div class="row"> 
                      @foreach ($records as $record)  
                        <div class="col-md-6  confirmrow_{{$record->id}}"> 
                          <div class="row">  
                            <div class="col-md-6">
                              <div class="form-group"> 
                                {{$record->period}} 
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class=" ">
                                <button type="trash"  class="btn btn-sm confirm" onclick="confirmrow({{$record->id}})" data-route='record' data-a_name='السجلات المدرسية'>  
                                  <i data-feather='trash-2'></i>
                                </button> 
                              </div> 
                            </div> 
                          </div>
                        </div> 
                      @endforeach 
                    </div>  
                    <div >
                      <button type="submit" class="btn btn-danger btn-block waves-effect waves-float waves-light" data-toggle="modal" data-target="#record">  اضافة قسم جديد </button> 
                    </div> 
                  </div>   
                </div>  
              </div>  
            </div>
          </div>
        </div>
      </section> 
    </div>
  
    {{-- record type --}}
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
                              <div class="divider divider-left divider-dark">
                                <div class="divider-text text-dark">أنواع العهدة</div>
                              </div>   
                          </div>
                        </div>
                      </section>  
                    </div>   
                    <div class="form-group">  
                      @foreach ($records as $record)  
                        <div class="form-group confirmparent_{{$record->id}}">  
                            <p class="text-danger">{{$record->period}}</p>    
                            <div class="row">
                              @forelse ($record->types as $type) 
                                <div class="col-md-6 confirmrow2_{{$type->id}}"> 
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class=" ">
                                        <p>
                                          -- {{$type->title}} 
                                        </p> 
                                      </div> 
                                    </div>  
                                    <div class="col-md-6">
                                      <div class=" ">
                                        <button type="trash"  class="btn btn-sm confirm2" onclick="confirmrow2({{$type->id}})" data-route='recordtype' data-a_name='السجلات'>  
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
                      <button type="submit"  class="btn btn-dark btn-block waves-effect waves-float waves-light" data-toggle="modal" data-target="#type">اضافة نوع جديد </button> 
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
  

   <!-- Modal record -->
   <div class="modal fade text-left" id="record" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-danger" id="myModalLabel17">السجلات المدرسية</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <div class="modal-body">   
           <div class="row">   
             <div class="col-12">
               <div class="card"> 
                 <div class="card-body">
                   <form action="#" class="invoice-repeater" id="form_record"> 
                     <input type="hidden" id="url" value="/records">   
                       <div class="row d-flex">     
                         <div class="col-md-12 col-12">
                           <div class="form-group"> 
                            <label for="type" class="text-danger"> النوع</label>
                             <input type="text" class="form-control" name="type" value="" placeholder="مثال: حفظ دائم " required/>
                             <span id="type_error" class="form-text text-danger small_error"> </span> 
                           </div>
                         </div>   
                       </div>   
                     <hr /> 
                     <div class="row">
                       <div class="col-12">  
                         <button class="btn btn-icon btn-danger" id="record_submit" type="submit"> 
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
    <!-- Modal record-->

 <!-- Modal type -->
 <div class="modal fade text-left" id="type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-dark" id="myModalLabel17">أضافة نوع جديد </h4>
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
                   <input type="hidden" id="types_url" value="/recordtypes">   
                     <div class="row d-flex">      
                      <div class="col-md-12 col-12">
                        <div class="form-group">
                         <label for="status2" class="text-dark"> السجلات المدرسية </label>
                         <select class="form-control" name="school_record_id" required> 
                           @foreach ($records as $record)  
                             <option value="{{$record->id}}">{{$record->period}}</option> 
                           @endforeach
                         </select>
                       </div> 
                      </div>     
                      <div class="col-md-12 col-12">
                       <div class="form-group"> 
                        <label for="status3" class="text-dark">الاسم </label>
                         <input type="text" class="form-control" name="title" value="" placeholder="مثال: جدول الاختبارات العام "required />
                         <span id="title_error" class="form-text text-dark small_error"> </span> 
                       </div>
                      </div>    
                      
                     </div>   
                   <hr /> 
                   <div class="row">
                     <div class="col-12">  
                       <button class="btn btn-icon btn-dark" id="type_submit" type="submit"> 
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
  {{-- vendor files --}}   
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>  
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>   
  <script src="{{ asset(mix('js/scripts/confirm-delete.js')) }}"></script>

@endsection 

   

@section('page-script') 
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
  <script>
  
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  
    $(document).on('click', '#record_submit', function (e) {
        e.preventDefault();
        $(".small_error").text('');
        var url = $("#url").val(); 
        var formData = new FormData($('#form_record')[0]); 
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
                    $("#record").modal('toggle'); 
                    toastr['success'](
                          'تم اضافة السجلات المدرسية بنجاح ',
                          ' السجلات المدرسية ' ,
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
                          'تم اضافة نوع السجل  بنجاح ',
                          ' انواع السجلات  ' ,
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
 