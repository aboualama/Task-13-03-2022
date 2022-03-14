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
  <div class="card">
    <div class="card-body">
 
      <div class="tab-content">
        <!-- Account Tab starts -->
        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
       
          <!-- company form start -->
          <form id="section_form" class="form-validate" >
            <div class="row">
   
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
              </div>
             

              {{-- section_inputs row --}}
              <div class="col-md-12" style="display: none" id="section_inputs"> 

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
                

                {{-- Taxs row --}}
                <div class="row"> 
                  <section id="divider-text-position" style="width: 98%; margin: auto;">
                    <div class="row">
                      <div class="col-md-12"> 
                          <div class="divider divider-left divider-danger">
                            <div class="divider-text text-danger">الضرائب والخصومات</div>
                          </div>   
                      </div>
                    </div>
                  </section> 
                  {{-- <section class="form-control-repeater" style="width: 100%;"> --}}
                    <div class="col-md-12"> 
                      <div class="row">  
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role"> نسبة الضريبة  (+)</label> 
                            <input type="number" class="form-control" name="tax_percent" id="basicInput" placeholder="%">
                            <span id="tax_percent_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role"> أضافة مبلغ (+) </label> 
                            <input type="number" class="form-control" name="tax_amount" id="basicInput" placeholder="+ 00.00">
                            <span id="tax_amount_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="role">اجمالي الخصومات  (-) </label> 
                            <input type="number" class="form-control" name="discount" id="basicInput" placeholder="- (00.00)">
                            <span id="discount_error" class="form-text text-danger small_error"> </span> 
                          </div>
                        </div>  
                      </div> 
                    </div>
                  {{-- </section>   --}}
                </div>
                {{-- end Taxs row --}}


                {{-- Basic price/kg row --}}
                <div class="row">

                  <section id="divider-text-position" style="width: 98%;margin: auto;">
                    <div class="row">
                      <div class="col-md-12"> 
                          <div class="divider divider-left divider-warning">
                            <div class="divider-text text-warning">اضف سعر لكل وزن</div>
                          </div>   
                      </div>
                    </div>
                  </section>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role"> 0.5 كجم  </label> 
                      <input type="number" class="form-control" name="kg0_5" id="basicInput" placeholder="السعر">
                      <span id="kg0_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">1.00 كجم</label> 
                      <input type="number" class="form-control" name="kg1" id="basicInput" placeholder="السعر">
                      <span id="kg1_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">1.5 كجم</label> 
                      <input type="number" class="form-control" name="kg1_5" id="basicInput" placeholder="السعر">
                      <span id="kg1_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">2.00 كجم</label> 
                      <input type="number" class="form-control" name="kg2" id="basicInput" placeholder="السعر">
                      <span id="kg2_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">2.5 كجم</label> 
                      <input type="number" class="form-control" name="kg2_5" id="basicInput" placeholder="السعر">
                      <span id="kg2_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">3.00 كجم</label> 
                      <input type="number" class="form-control" name="kg3" id="basicInput" placeholder="السعر">
                      <span id="kg3_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">3.5 كجم</label> 
                      <input type="number" class="form-control" name="kg3_5" id="basicInput" placeholder="السعر">
                      <span id="kg3_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">4.00 كجم</label> 
                      <input type="number" class="form-control" name="kg4" id="basicInput" placeholder="السعر">
                      <span id="kg4_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">4.5 كجم</label> 
                      <input type="number" class="form-control" name="kg4_5" id="basicInput" placeholder="السعر">
                      <span id="kg4_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">5.00 كجم</label> 
                      <input type="number" class="form-control" name="kg5" id="basicInput" placeholder="السعر">
                      <span id="kg5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">5.5 كجم</label> 
                      <input type="number" class="form-control" name="kg5_5" id="basicInput" placeholder="السعر">
                      <span id="kg5_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">6.00 كجم</label> 
                      <input type="number" class="form-control" name="kg6" id="basicInput" placeholder="السعر">
                      <span id="kg6_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">6.5 كجم</label> 
                      <input type="number" class="form-control" name="kg6_5" id="basicInput" placeholder="السعر">
                      <span id="kg6_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">7.00 كجم</label> 
                      <input type="number" class="form-control" name="kg7" id="basicInput" placeholder="السعر">
                      <span id="kg7_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">7.5 كجم</label> 
                      <input type="number" class="form-control" name="kg7_5" id="basicInput" placeholder="السعر">
                      <span id="kg7_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">8.00 كجم</label> 
                      <input type="number" class="form-control" name="kg8" id="basicInput" placeholder="السعر">
                      <span id="kg8_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">8.5 كجم</label> 
                      <input type="number" class="form-control" name="kg8_5" id="basicInput" placeholder="السعر">
                      <span id="kg8_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">9.00 كجم</label> 
                      <input type="number" class="form-control" name="kg9" id="basicInput" placeholder="السعر">
                      <span id="kg9_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">9.5 كجم</label> 
                      <input type="number" class="form-control" name="kg9_5" id="basicInput" placeholder="السعر">
                      <span id="kg9_5_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">10.00 كجم</label> 
                      <input type="number" class="form-control" name="kg10" id="basicInput" placeholder="السعر">
                      <span id="kg10_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">11.00 كجم</label> 
                      <input type="number" class="form-control" name="kg11" id="basicInput" placeholder="السعر">
                      <span id="kg11_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">12.00 كجم</label> 
                      <input type="number" class="form-control" name="kg12" id="basicInput" placeholder="السعر">
                      <span id="kg12_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">13.00 كجم</label> 
                      <input type="number" class="form-control" name="kg13" id="basicInput" placeholder="السعر">
                      <span id="kg13_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">14.00 كجم</label> 
                      <input type="number" class="form-control" name="kg14" id="basicInput" placeholder="السعر">
                      <span id="kg14_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">15.00 كجم</label> 
                      <input type="number" class="form-control" name="kg15" id="basicInput" placeholder="السعر">
                      <span id="kg15_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">16.00 كجم</label> 
                      <input type="number" class="form-control" name="kg16" id="basicInput" placeholder="السعر">
                      <span id="kg16_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">17.00 كجم</label> 
                      <input type="number" class="form-control" name="kg17" id="basicInput" placeholder="السعر">
                      <span id="kg17_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">18.00 كجم</label> 
                      <input type="number" class="form-control" name="kg18" id="basicInput" placeholder="السعر">
                      <span id="kg18_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">19.00 كجم</label> 
                      <input type="number" class="form-control" name="kg19" id="basicInput" placeholder="السعر">
                      <span id="kg19_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div> 
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="role">20.00 كجم</label> 
                      <input type="number" class="form-control" name="kg20" id="basicInput" placeholder="السعر">
                      <span id="kg20_error" class="form-text text-danger small_error"> </span> 
                    </div>
                  </div>  
                </div> 
                {{-- end Basic price/kg row --}}


                {{-- Custom price/kg row --}}
                <div class="row"> 
                  <section id="divider-text-position" style="width: 98%; margin: auto;">
                    <div class="row">
                      <div class="col-md-12"> 
                          <div class="divider divider-left divider-primary">
                            <div class="divider-text text-primary">اضافة اوزان خاصة</div>
                          </div>   
                      </div>
                    </div>
                  </section> 
                  <section class="form-control-repeater" style="width: 100%;" index>
                    <div class="row"> 
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-body" id="weights">

                          </div>
                        </div>
                      </div> 
                    </div>
                  </section>  
                </div>
                {{-- end Custom price/kg row --}}


 


    
                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                  <button type="submit" id="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">حفظ</button>
                  <button type="reset" id="reset" class="btn btn-outline-secondary">تحديث</button>
                </div>
                
              </div>
              {{-- end section_inputs row --}}


            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
        <!-- Account Tab ends -->
 
 
      </div>
    </div>
  </div>
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
              url:"{{ route('get-zone') }}",
              type:"get",
              data: {
              id: id
              },
              success:function (data) { 
                $('#form').empty();
                $.each(data.zones,function(index,zone){
                  $('#form').append('<option value="'+zone.num+'">المنطقة رقم: '+zone.num+'</option>');
                })   
                $('#to').empty();
                $.each(data.zones,function(index,zone){
                  $('#to').append('<option value="'+zone.num+'">المنطقة رقم: '+zone.num+'</option>');
                })

                $('#weights').empty();
                $.each(JSON.parse(data.company.weights),function(index,company){
                  $('#weights').append(`
                            <div  class="invoice-repeater">
                              <div data-repeater-list="custom_weights">
                                <div data-repeater-item="">
                                  <div class="row d-flex "> 
                              
                                      <div class="col-md-5 col-12">
                                        <div class="form-group">
                                          <label for="itemname">الوزن بالكيلو جرام</label>
                                          <input type="text" class="form-control" id="itemname" name="weights[]" value="${JSON.parse(data.company.weights)[index]}" aria-describedby="itemname" placeholder="الوزن">
                                          <span id="weights_${index}_error" class="form-text text-danger small_error"> </span>  
                                        </div>
                                      </div>
                                      
                                      <div class="col-md-5 col-12">
                                        <div class="form-group">
                                          <label for="itemcost">السعر</label>
                                          <input type="number" class="form-control" id="itemcost" name="prices[]" aria-describedby="itemcost" placeholder="السعر"> 
                                          <span id="prices_${index}_error" class="form-text text-danger small_error"> </span>  
                                        </div>
                                      </div>
                                  </div> 
                                </div>
                              </div> 
                            </div>
                                      `);
                })   
              }
            })

          }
        }); 







      </script>


      <script type="text/javascript">






        $(document).on('click', '#submit', function (e) {
            e.preventDefault();
            $(".small_error").text(''); 
            var formData = new FormData($('#section_form')[0]);

            console.log(formData);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: 'store_price_list',
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
                        // window.location.href = "/en/question"; 
                        toastr['success'](
                              'تم اضافة      قائمة الاسعار بنجاح',
                              ' أسعار الشحن ' ,
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
 