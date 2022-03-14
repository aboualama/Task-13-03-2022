   

 
    <input type="hidden" value="custody" id="url">  

    <div class="row clear_form"> 
 
      <div class="col-md-12"> 
        <div class="row">   
          <div class="col-md-4">
            <div class="form-group">
              <label for="serial_number"> رقم مسلسل</label> 
              <input type="number" class="form-control" name="serial_number" id="serial_number" placeholder=" " required> 
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group">
              <label for="public_number"> رقم عام </label> 
              <input type="number" class="form-control" name="public_number" id="public_number" placeholder=" " required> 
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group">
              <label for="private_number"> رقم خاص </label> 
              <input type="number" class="form-control" name="private_number" id="private_number" placeholder=" " required> 
            </div>
          </div>    
        </div> 
      </div>   
 
  

      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="received_date">تاريخ الاستلام </label> 
              <input  type="text" id="fp-default" class="form-control flatpickr-basic" name="received_date" placeholder="YYYY-MM-DD" required>  
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="date_of_publication">تاريخ النشر </label> 
              <input  type="text" id="date_of_publication" class="form-control flatpickr-basic" name="date_of_publication" placeholder="YYYY-MM-DD" required>  
            </div>
          </div>     
        </div> 
      </div>    
 

      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="receipt_number">  رقم الورود</label> 
              <input type="number" class="form-control" name="receipt_number" id="receipt_number" placeholder=" " required> 
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="book_supplier"> جهة الورود </label> 
              <input type="text" class="form-control" name="book_supplier" id="book_supplier" placeholder=" " required> 
            </div>
          </div>    
        </div> 
      </div>   
 
 

      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="book_title">  عنوان الكتاب</label> 
              <input type="text" class="form-control" name="book_title" id="book_title" placeholder=" " required> 
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="author"> المؤلف </label> 
              <input type="text" class="form-control" name="author" id="author" placeholder=" " required> 
            </div>
          </div>    
        </div> 
      </div>   
 
  

      <div class="col-md-12"> 
        <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <label for="publisher"> الناشر</label> 
              <input type="text" class="form-control" name="publisher" id="publisher" placeholder=" " required> 
            </div>
          </div>   
          <div class="col-md-6">
            <div class="form-group">
              <label for="place_of_publication"> مكان النشر </label> 
              <input type="text" class="form-control" name="place_of_publication" id="place_of_publication" placeholder=" " required> 
            </div>
          </div>    
        </div> 
      </div>   
 
 
      <div class="col-md-12">
        <div class="form-group">
          <label for="notes"> الملاحظات</label>  
          <textarea class="form-control " id="notes" name="notes" rows="5" placeholder="اضاف بعض الملاحظات" required></textarea> 
        </div>
      </div>    

      <div class="col-12 ">
        <button type="submit" id="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">   
          <span>أضافة</span>
        </button> 
      </div>
    </div> 

  
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>

