 


          <section id="multiple-column-form">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> أضافة مؤهل جديد</h4>
                  </div>
                  <div class="card-body"> 
                    <form  id="form_qualification"> 
                      @csrf  
                      <input type="hidden" value="/new_qualification" id="new_qualification_url"> 
                      <input type="hidden" value="{{$employee->id}}" name="id"> 
                      <input type="hidden" value="مؤهل جديد" id="model">  
                        <div class="row"> 
                            <div class="col-12">   
                                <div class="row">  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="qualification_id">  المؤهل    </label>  
                                      <select class="form-control" name="qualification_id"  id="qualification_id" required> 
                                        <option value="">.........  </option> 
                                        @foreach ($qualification as $record) 
                                          <option value="{{$record->id}}">{{$record->name}}</option> 
                                        @endforeach
                                      </select>
                                    </div> 
                                  </div>    
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="qualification_date"> التاريخ  </label> 
                                      <input type="text" id="qualification_date" class="form-control" name="qualification_date" placeholder="2015">  
                                    </div>
                                  </div>  
                                  <div class="col-md-3"> 
                                    <div class="form-group">
                                      <label for="qualification_round">  الدور </label> 
                                      <select class="form-control" name="qualification_round"  id="qualification_round" required> 
                                        <option value="">.........  </option>
                                        <option  value="أول">الاول</option> 
                                        <option  value="ثاني">الثاني</option>    
                                      </select>
                                    </div>
                                  </div>       
                                </div> 
                              </div>  
                  
                              <div class="col-md-12">  
                                <div class="row">  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="qualification_source"> جهة الاصدار    </label> 
                                      <input type="text" class="form-control" name="qualification_source" id="qualification_source" placeholder="جامعة الاسكندرية - كلية التجارة">  
                                    </div>
                                  </div>    
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="qualification_degree"> درجة المؤهل  </label> 
                                      <input type="text" id="qualification_degree" class="form-control" name="qualification_degree" placeholder="امتياز">  
                                    </div>
                                  </div>  
                                  <div class="col-md-3"> 
                                    <div class="form-group">
                                      <label for="qualification_major"> التخصص   </label> 
                                      <input type="text" id="qualification_major" class="form-control" name="qualification_major" placeholder="اقتصاد ">  
                                    </div>
                                  </div>       
                                </div> 
                              </div> 


                            <div class="col-12"> 
                            <button type="reset" class="btn btn-primary mr-1" id="add_new_qualification">اضافة</button>
                            <button type="reset" class="btn btn-outline-secondary">تراجع</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>







 