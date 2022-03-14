
<div class="row">
  <!-- Company   -->
  <div class="col-12">
    <div class="card"> 

      <section id="accordion-with-margin">
        <div class="row">
          <div class="col-sm-12">
            <div class="card collapse-icon">
              <div class="card-header">
                <h4 class="card-title">تقسيم المناطق</h4>
              </div>
              <div class="card-body">
                <p class="card-text">
                  يمكن أضافة كل البلاد الي مناطق حسب تقسيمات الشركة <code>.البلاد</code> يمكن أضافة كل البلاد الي مناطق حسب تقسيمات الشركة.
                </p>
                <div class="collapse-margin" id="accordionExample">
                  @foreach ( $company->zones as $i => $zone) 
           
                    <div class="card">
                      <div class="card-header" id="heading{{$zone->id}}" data-toggle="collapse" role="button" data-target="#collapse{{$zone->id}}" aria-expanded="false" aria-controls="collapse{{$zone->id}}">
                        <span class="lead collapse-title"> المنطقة رقم {{$zone->num}} </span>
                      </div>
                      <div id="collapse{{$zone->id}}" class="collapse" aria-labelledby="heading{{$zone->id}}" data-parent="#accordionExample">
                        <div class="card-body">
                          <p class="card-text text-success">
                            <form action="#" class="invoice-repeater">
                              @csrf 
                              <input type="hidden" id="url" value="/add_countries_to_zone">
                              <div class="row">
                                @forelse ($countries as $country)
                                  <div class="col-lg-2 col-md-4 col-6">
                                    <div class="demo-inline-spacing"> 
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input country_checkbox_{{$zone->id}}" id="customCheck_{{$i}}_{{$country->id}}" value="{{$country->id}}" {{in_array($country->country_name, $zone->countries->pluck('country_name')->toArray()) ?  'checked' : '' }} >
                                        <label class="custom-control-label" for="customCheck_{{$i}}_{{$country->id}}"> {{$country->country_name}}</label>
                                      </div>
                                    </div> 
                                  </div> 
                                @empty
                                <div class="text-center">لا يوجد مدن مضافة الي هذه المنطقة حتي الان   </div> 
                                @endforelse
                              </div>   
                            </form>
                          </p>  

                          <div class="col-12">
                            <div class="form-group"> 
                              <div class="input-group-append" id="button-addon2">  
                                <!-- Button trigger modal -->
                                <button type="submit" class="btn btn-primary" onclick="addCountries({{$zone->id}} , event)" style="margin: 0 auto;">
                                  تعديل
                                </button> 
                              </div>
                            </div>
                          </div>  
 
                        </div>
                      </div>
                    </div>
                    
                  @endforeach
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
 
    </div>
  </div>  

</div>






 
  <script>
  

  // add Countries
 function addCountries(i , e) {  
            e.preventDefault();  

            $(".small_error").text('');
            var url = $("#url").val(); 
            var id = i;  
            var countries = new Array();
                $(".country_checkbox_" + i + ":checked").each(function() {
                  countries.push($(this).val());
                });

                console.log(countries);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post', 
                url: url,
                data:{
                  id: id,
                  countries: countries,  
                },
                success: function (data) {
 
                        $(".collapse").collapse('hide'); 
                        toastr['success'](
                              'تم اضافة البلاد بنجاح',
                              ' تقسيم المناطق ' ,
                              {
                                closeButton: true,
                                tapToDismiss: false, 
                                positionClass: 'toast-top-right',
                                rtl: 'rtl'
                              }
                            ); 
                }, error: function (xhr) {

                }
            });
        };
 

  </script> 