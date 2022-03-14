 

  <h4 class="modal-title text-center mb-1 mt-1"> تعديل البيانات الاساسية</h4>
    <!-- form -->
    <form class="validate-form mt-2" id="edit_form">
      @csrf
      {{ method_field('PUT') }}
      <input type="hidden" id="edit_url" value="{{ route('user-update', $record->id) }}"/>
      <div class="row">
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label for="account-username">الاسم</label>
            <input
              type="text"
              class="form-control"
              id="account-username"
              name="name" 
              value="{{$record->name}}"
            />
          </div>
          <small id="edit_name_error" class="form-text text-danger center small_error"> </small>
        </div>
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label for="account-name">رقم التليفون</label>
            <input
              type="text"
              class="form-control"
              id="account-name"
              name="phone" 
              value="{{$record->phone}}"
            />
          </div>
          <small id="edit_phone_error" class="form-text text-danger center small_error"> </small>
        </div>
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label for="account-e-mail">البريد الالكتروني</label>
            <input
              type="email"
              class="form-control"
              id="account-e-mail"
              name="email"
              value="{{$record->email}}"
            />
          </div>
          <small id="edit_email_error" class="form-text text-danger center small_error"> </small>
        </div>
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label for="status_id"> الحالة  </label> 
            <select class="form-control" name="status"  id="status_id" required> 
              <option value="">.........  </option> 
              <option value="مفعل" {{($record->status == 'مفعل') ? 'selected' : ''}} >مفعل</option> 
              <option value="غير مفعل" {{($record->status == 'غير مفعل') ? 'selected' : ''}} >غير مفعل</option> 
              <option value="معلق" {{($record->status == 'معلق') ? 'selected' : ''}} >معلق</option> 
            </select>
          </div>
          <small id="edit_status_error" class="form-text text-danger center small_error"> </small>
        </div> 
      </div> 
    <!--/ form -->



  <h4 class="mb-1 mt-1"> تغيير كلمة المرور</h4>
  <!-- form -->  
    <div class="row">
      <div class="col-12 col-sm-6">
        <div class="form-group"> 
          <div class="input-group form-password-toggle input-group-merge">
            <input type="password"
              id="account-new-password" name="password" class="form-control"
              placeholder="كلمة المرور "
            /> 
          </div>
        </div>
        <small id="edit_password_error" class="form-text text-danger center small_error"> </small>
      </div>
      <div class="col-12 col-sm-6">
        <div class="form-group"> 
          <div class="input-group form-password-toggle input-group-merge">
            <input
              type="password"
              class="form-control"
              id="account-retype-new-password"
              name="password_confirmation"
              placeholder="تاكيد كلمة المرور"
            />
          </div>
        </div>
      </div>
      <div class="col-12" style="float: left;">
        <button type="submit" id="edit_submit" class="btn btn-primary mr-1 mt-1"> حفظ</button>
        <button type="reset" class="btn btn-outline-secondary mt-1">الغاء</button>
      </div>
    </div>
  </form>
  <!--/ form -->

<script>
    feather.replace()
</script>



<script>
 

  $(document).on('click', '#edit_submit', function (e) {
          e.preventDefault();
          $(".small_error").text('');
          var url      = $("#edit_url").val();
          var formData = new FormData($('#edit_form')[0]);  
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
                $("#edit_" + str + "_error").text(val[0]);
                console.log(str);
              });
            }else{
                $("#edit-modal").modal('toggle');   
                  toastr['success'](
                        'قائمة الاعضاء' ,
                        'تم التعديل بنجاح',
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
 
          },
          error: function (data) {
              console.log('Error:', data);
          }
      });
});

</script>