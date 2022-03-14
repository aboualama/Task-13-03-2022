
 
<div class="row">
  <!-- country repeater -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">تعديل {{$country->country_name}}  </h4>
      </div>
      <div class="card-body">
        <form action="#" class="invoice-repeater" id="form" enctype="multipart/form-data">
          @csrf

          
          <input type="hidden" id="url" value="/country">
          <input type="hidden" id="id" name="id" value="{{$country->id}}">
 
          {{-- <div class="row d-flex align-items-end">  --}}
          <div class="row d-flex"> 

  
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="country_name">أسم الدولة</label>
                    <input type="text" class="form-control" id="country_name" name="country_name" value="{{$country->country_name}}"  />
                    <span id="country_name_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="continent_name">اسم القارة</label>
                    <input type="text" class="form-control" id="continent_name" name="continent_name" value="{{$country->continent_name}}"  />
                    <span id="continent_name_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="country_code">الرمز  </label>
                    <input type="text" class="form-control" id="country_code" name="country_code" value="{{$country->country_code}}" />
                    <span id="country_code_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="phone_code">رمز الهاتف  </label>
                    <input type="number" class="form-control" id="phone_code" name="phone_code" value="{{$country->phone_code}}" />
                    <span id="phone_code_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 

                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="itemname">معلومات اضافية</label>
                    <input type="text" class="form-control" id="itemoption" name="option" value="{{$country->option}}"  />
                    <span id="option_error" class="form-text text-danger small_error"> </span> 
                  </div>
                </div> 


                
              </div> 
              <hr /> 
          <div class="row">
            <div class="col-12">  
              <button class="btn btn-icon btn-primary" id="edit" type="submit">
                <i data-feather="plus" class="mr-25"></i>
                <span>حقظ</span>
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- /country repeater -->
</div>
  