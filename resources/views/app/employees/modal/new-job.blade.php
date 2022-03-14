 


          <section id="multiple-column-form">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">  أضافة وظيفة جديدة</h4>
                  </div>
                  <div class="card-body">
                    <form  id="form_job"> 
                      @csrf  
                      <input type="hidden" value="/new_job" id="new_job_url"> 
                      <input type="hidden" value="{{$employee->id}}" name="id"> 
                      <input type="hidden" value="وظيفة جديدة" id="model">  

                      <div class="row"> 
                        <div class="col-12">
                          <div class="divider divider-left divider-secondary">
                            <div class="divider-text text-secondary"> الوظيفة الحالية  </div>
                          </div>   
          
                          <div class="row">    
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="functional_group_id">المجموعة الوظيفية </label>
                                <select class="form-control" name="functional_group_id" id="functional_group_new_job_id" > 
                                  <option  value="">.........  </option>
                                  @foreach ($functionalGroup as $record) 
                                    <option value="{{$record->id}}">{{$record->name}}</option> 
                                  @endforeach
                                </select>
                              </div> 
                            </div> 
              
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="sub_group_id"> المجموعة النوعية</label>
                                <select class="form-control" name="sub_group_id" id="sub_group_new_job_id"> 
                                  <option  value=""> اختار المجموعة الوظيفية اولا</option>
                                </select>
                              </div> 
                            </div> 
              
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="job_function_name">  المسمى الوظيفى </label>
                                <input type="text" class="form-control" name="job_function_name" id="job_function_name" placeholder="طبيب اسنان" required  />  
                              </div> 
                            </div>  
                          </div> 
                        </div>  
            
                        <div class="col-md-12">  
                          <div class="row">  
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="financial_degree_id">  الدرجة الوظيفية</label> 
                                <select class="form-control" name="financial_degree_id"  id="financial_degree_id" required> 
                                  <option value="">.........  </option>
                                  @foreach ($financialDegree as $record) 
                                    <option value="{{$record->id}}">{{$record->name}}</option> 
                                  @endforeach
                                </select>
                              </div>
                            </div>  
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="degree_date">  تاريخ الدرجة الوظيفية</label> 
                                <input  type="text" id="degree_date" class="form-control flatpickr-basic" name="degree_date" placeholder="YYYY-MM-DD" required>  
                              </div>
                            </div>     
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="join_date">تاريخ التوظيف </label> 
                                <input  type="text" id="join_date" class="form-control flatpickr-basic" name="join_date" placeholder="YYYY-MM-DD" required>  
                              </div>
                            </div>    
                          </div> 
                        </div> 
            
                        <div class="col-md-12">  
                          <div class="row">  
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="job_style_id">   اسلوب شغل الوظيفة</label> 
                                <select class="form-control" name="job_style_id"  id="job_style_id" required> 
                                  <option value="">.........  </option>
                                  @foreach ($jobStyle as $record) 
                                    <option value="{{$record->id}}">{{$record->name}}</option> 
                                  @endforeach
                                </select>
                              </div>
                            </div>   
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="cader_id"> الكادر</label> 
                                <select class="form-control" name="cader_id"  id="cader_id" required> 
                                  <option value="">.........  </option>
                                  @foreach ($cader as $record) 
                                    <option value="{{$record->id}}">{{$record->name}}</option> 
                                  @endforeach
                                </select>
                              </div>
                            </div>  
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="job_status_id"> الحالة الوظيفية</label> 
                                <select class="form-control" name="job_status_id"  id="job_status_id" required> 
                                  <option value="">.........  </option>
                                  @foreach ($jobStatus as $record) 
                                    <option value="{{$record->id}}">{{$record->name}}</option> 
                                  @endforeach
                                </select>
                              </div>
                            </div>    
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="nomination_type_id">نوع التعيين  </label> 
                                <select class="form-control" name="nomination_type_id"  id="nomination_type_id" required> 
                                  <option value="">.........  </option>
                                  @foreach ($nominationType as $record) 
                                    <option value="{{$record->id}}">{{$record->name}}</option> 
                                  @endforeach
                                </select>  
                              </div>
                            </div>    
                          </div> 
                        </div> 
                      </div>


                      <div class="col-12">
                      <button type="reset" class="btn btn-primary mr-1" id="add_new_job">اضافة</button>
                      <button type="reset" class="btn btn-outline-secondary">تراجع</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>







 