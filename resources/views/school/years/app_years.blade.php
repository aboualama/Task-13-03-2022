
@extends('layouts/contentLayoutMaster')

@section('title', 'بيانات المدرسة')

@section('vendor-style') 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">  
@endsection

@section('page-style') 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">  
@endsection 
  

@section('content') 
 
  <section class="app-user-edit">
    <div class="card">
      <div class="card-body">
   
        <div class="tab-content">
          <!-- Account Tab starts -->
          <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
          
              <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="status">العام الدراسي</label>
                    <select class="form-control" name="year_id" id="year" > 
                      <option value="{{$defaultyear->id}}" selected >{{$defaultyear->year}}</option> 
                      @foreach ($years as $year) 
                        <option value="{{$year->id}}" >{{$year->year}}</option> 
                      @endforeach
                    </select>
                  </div> 
                </div> 
                   
                <div class="col-md-12"  id="section_inputs">  
   
                  <div class="row"> 
                    <section id="divider-text-position" style="width: 98%; margin: auto;">
                      <div class="row">
                        <div class="col-md-12"> 
                            <div class="divider divider-left divider-danger">
                              <div class="divider-text text-danger">الاجماليات</div>
                            </div>   
                        </div>
                      </div>
                    </section>  
                      <div class="col-md-12"> 
                        <div class="row">  
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="role"> الوكيلات</label> 
                              <input type="number" class="form-control" name="agents" id="agents" placeholder="{{$record->settings->agents ??  0}}" disabled> 
                            </div>
                          </div>   
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="role"> الاداريات </label> 
                              <input type="number" class="form-control" name="administrators" id="administrators" placeholder="{{$record->settings->administrators  ??  0}}" disabled> 
                            </div>
                          </div>   
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="role">المعلمات </label> 
                              <input type="number" class="form-control" name="teachers" id="teachers" placeholder="{{$record->settings->teachers  ??  0}}" disabled> 
                            </div>
                          </div>   
                        </div> 
                      </div>
 
                      <div class="col-md-12"> 
                        <div class="row">  
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="role"> الطالبات</label> 
                              <input type="number" class="form-control" name="students" id="students" placeholder="{{\App\Models\StudentCount::where('year_id', $defaultyear->id)->sum('count')  ??  0}}" disabled> 
                            </div>
                          </div>   
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="role">المستخدمات </label> 
                              <input type="number" class="form-control" name="users" id="users" placeholder="{{$record->settings->users  ??  0}}" disabled> 
                            </div>
                          </div>   
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="role">عدد الحراس</label> 
                              <input type="number" class="form-control" name="guards" id="guards" placeholder="{{$record->settings->guards  ??  0}}" disabled> 
                            </div>
                          </div>  
                        </div> 
                      </div> 
                  </div> 
                  <div class="row">
  
                    <section id="divider-text-position" style="width: 98%;margin: auto;">
                      <div class="row">
                        <div class="col-md-12"> 
                            <div class="divider divider-left divider-warning">
                              <div class="divider-text text-warning">الرقم الوزاري</div>
                            </div>   
                        </div>
                      </div>
                    </section>
     
                    <div class="col-md-12"> 
                      <div class="row">  
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role"> قسم الابتدائي</label> 
                            <input type="number" class="form-control" name="primary_no" id="primary_no" placeholder="{{$record->settings->primary_no  ??  0}}" disabled> 
                          </div>
                        </div>   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role">قسم المتوسط </label> 
                            <input type="number" class="form-control" name="middle_no" id="middle_no" placeholder="{{$record->settings->middle_no  ??  0}}" disabled> 
                          </div>
                        </div>   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role">قسم الثانوي</label> 
                            <input type="number" class="form-control" name="secondary_no" id="secondary_no" placeholder="{{$record->settings->secondary_no  ??  0}}" disabled> 
                          </div>
                        </div>  
                      </div> 
                    </div>
                  </div>   
                </div>   
      
                <div class="col-12 d-flex flex-sm-row flex-column mt-2"> 
                          
                  <button type="button" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 add"> 
                    <i data-feather="plus" class="mr-25"></i>
                    <span>أضافة</span>
                  </button> 
                          
                  <button type="button" class="btn btn-success mb-1 mb-sm-0 mr-0 mr-sm-1 edit"> 
                    <i data-feather="edit" class="mr-25"></i>
                    <span>تعديل</span>
                  </button> 
                </div>
                
              </div> 
          </div> 
   
   
        </div>
      </div>
    </div>
  </section>
 

 

  <!-- Modal -->
  <div class="col-12">
    <div class="row">
      <div class="modal-size-lg mr-1 mb-1 d-inline-block">
        <div class="modal fade text-left" id="modal-block" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel17" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> اعدادات  {{$setting->name}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="setting"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





 
 
@endsection


@section('vendor-script')  
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>   
@endsection 
 
@section('page-script')
  {{-- Page js files --}} 
   
  <script src="{{ asset(mix('js/scripts/components/components-modals.js')) }}"></script>
  <script>
 
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

 
 //  edit model
    $('.edit').on("click", function (e) {
      e.stopPropagation();
      var id = $('#year').val();
      console.log(id);
      $.ajax({
        type: 'GET',
        url: '/edit-setting/' + id,
        success: function (data) {
          $('#modal-block').modal('toggle');
          $('#setting').html(data);
        }
      });
    });

    
 //  add model
    $('.add').on("click", function (e) {
      e.stopPropagation();  
      $.ajax({
        type: 'GET',
        url: '/add-setting/',
        success: function (data) {
          $('#modal-block').modal('toggle');
          $('#setting').html(data);
        }
      });
    });


 // change year
    $('#year').on("change", function (e) {
      e.stopPropagation();
      var id = $('#year').val();
      $.ajax({
        type: 'GET',
        url: '/change-year/' + id,
        success: function (data) {  
          $('#section_inputs').html(data);
        }
      });
    });
 
   
    $(document).on('click', '#submit', function (e) {
      e.preventDefault();
      $(".small_error").text('');
      var url = $("#url").val(); 
      var formData = new FormData($('#form')[0]); 
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
                  $("#modal-block").modal('toggle');   
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