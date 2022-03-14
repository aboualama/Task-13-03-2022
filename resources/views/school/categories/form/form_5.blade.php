
<input type="hidden" value="doc_custody" id="url">  

<div class="row clear_form"> 



    @if ($type == 10)    
        
        <div class="col-12 "> 

        
            <input type="hidden" value="teacher" name="person">  

            <div class="row">  
                <div class="col-md-12"> 
                    <div class="row">  
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="number">  رقم المعلمة </label> 
                            <input type="number" class="form-control" name="number" id="number" placeholder=" "  required> 
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="name">اسم المعلمة    </label> 
                            <input type="text" class="form-control" name="name" id="name" placeholder=" "  required> 
                            </div>
                        </div>     
                    </div> 
                </div>   
            </div>    

            <div class="mt-2 mb-4" style="    width: 80%; display: block; margin: 0 auto; border: 1px solid #ccc; border-radius: 12px; padding: 20px;"> 
                <div class="col-md-12"> 
                    <div class="row">  
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="identity" name="identity" checked />
                                        <label class="custom-control-label" for="identity"> بطاقة العائله</label>
                                    </div> 
                                </div>
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-secondary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="costs" name="costs" checked />
                                        <label class="custom-control-label" for="costs"> تحديد التكاليف</label>
                                    </div> 
                                </div>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-success custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="qualification" name="qualification" checked />
                                        <label class="custom-control-label" for="qualification">المؤهل </label>
                                    </div> 
                                </div>
                            </div>
                        </div>     
                    </div>    
                </div>  

                <div class="col-md-12"> 
                    <div class="row" >  
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-danger custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="functionality" name="functionality" checked />
                                        <label class="custom-control-label" for="functionality">الاداء الوظيفي </label>
                                    </div> 
                                </div>
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-warning custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="job_decision" name="job_decision" checked />
                                        <label class="custom-control-label" for="job_decision">قرار التعيين </label>
                                    </div> 
                                </div>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="satisfactory_reports" name="satisfactory_reports" checked />
                                        <label class="custom-control-label" for="satisfactory_reports">تقارير مرضية </label>
                                    </div> 
                                </div>
                            </div>
                        </div>     
                    </div>    
                </div>  
                <div class="col-md-12">
                    <div class="row" >  
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-dark custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="direct" name="direct" checked />
                                        <label class="custom-control-label" for="direct">المباشرة  </label>
                                    </div> 
                                </div>
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-success custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="thanks_letter" name="thanks_letter" checked />
                                        <label class="custom-control-label" for="thanks_letter">خطاب شكر   </label>
                                    </div> 
                                </div>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-danger custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="director_nomination" name="director_nomination" checked />
                                        <label class="custom-control-label" for="director_nomination"> ترشيح مديرة </label>
                                    </div> 
                                </div>
                            </div>
                        </div>     
                    </div>    
                </div>  
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="demo-inline-spacing">
                            <div class="custom-control custom-control-info custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="service_statement" name="service_statement" checked />
                                <label class="custom-control-label" for="service_statement">بيان خدمة</label>
                            </div> 
                        </div>
                    </div>
                </div>  
            </div>  
            <div class="col-md-12">  
                <div class="form-group">
                    <label for="reason_leaving">سبب ترك العمل  </label> 
                    <input type="text" class="form-control" name="reason_leaving" id="reason_leaving" placeholder=" "  required> 
                </div>  
            </div>   
        

        </div> 

    @else

        <div class="col-12 "> 

            <input type="hidden" value="student" name="person">  
            
            <div class="row">  
                <div class="col-md-12"> 
                    <div class="row">  
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="number">  رقم الطالبة </label> 
                            <input type="number" class="form-control" name="number" id="number" placeholder=" "  required> 
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="name">اسم الطالبة    </label> 
                            <input type="text" class="form-control" name="name" id="name" placeholder=" "  required> 
                            </div>
                        </div>     
                    </div> 
                </div>    
            </div>    

            <div class="mt-2 mb-4" style="    width: 80%; display: block; margin: 0 auto; border: 1px solid #ccc; border-radius: 12px; padding: 20px;"> 
                <div class="col-md-12"> 
                    <div class="row">  
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="identity" name="identity" checked />
                                        <label class="custom-control-label" for="identity">الهوية (كارت العائلة , الاقامة)</label>
                                    </div> 
                                </div>
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-secondary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="vaccination_card" name="vaccination_card" checked />
                                        <label class="custom-control-label" for="vaccination_card">كرت التطعيم</label>
                                    </div> 
                                </div>
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="demo-inline-spacing">
                                    <div class="custom-control custom-control-success custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="elementary_certificate" name="elementary_certificate" checked />
                                        <label class="custom-control-label" for="elementary_certificate">شهادة الابتدائي</label>
                                    </div> 
                                </div>
                            </div>
                        </div>     
                    </div>    
                </div>  

                <div class="col-md-12"> 
                <div class="row" >  
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="demo-inline-spacing">
                                <div class="custom-control custom-control-danger custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="medical_examination" name="medical_examination" checked />
                                    <label class="custom-control-label" for="medical_examination">الكشف الطبي</label>
                                </div> 
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="demo-inline-spacing">
                                <div class="custom-control custom-control-warning custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="intermediate_certificate" name="intermediate_certificate" checked />
                                    <label class="custom-control-label" for="intermediate_certificate">شهادة المتوسط</label>
                                </div> 
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="demo-inline-spacing">
                                <div class="custom-control custom-control-info custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="semester_certificate" name="semester_certificate" checked />
                                    <label class="custom-control-label" for="semester_certificate">شهادة الفصلين</label>
                                </div> 
                            </div>
                        </div>
                    </div>     
                </div>    
                </div>  
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="demo-inline-spacing">
                            <div class="custom-control custom-control-dark custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="birth_certificate" name="birth_certificate" checked />
                                <label class="custom-control-label" for="birth_certificate">شهادة الميلاد</label>
                            </div> 
                        </div>
                    </div>
                </div>  
            </div> 


        </div>

    @endif

    <div class="col-12 ">
        <button type="submit" id="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">   
        <span>أضافة</span>
        </button> 
    </div>

</div> 