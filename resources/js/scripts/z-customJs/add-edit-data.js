$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}}); 
  
$(document).on('click', '#new_submit', function (e) {
    e.preventDefault();
    
    var pageTitel = $("#pageTitel").val(); 
    $(".small_error").text('');
    var url = $("#url").val(); 
    var formData = new FormData($('#new_form')[0]); 
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
                $("#add_new").modal('toggle'); 
                toastr['success'](
                      'تم اضافة قسم جديد بنجاح ',
                      pageTitel   ,
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

 


$('.action-edit').on("click", function (e) {
    e.stopPropagation();
    var id = $(this).data("id"); 
    var route = $(this).data("route"); 
    $.ajax({
        type: 'GET',
        url: route + '/' + id +'/edit',
        success: function (data) {
        $('#edit-modal').modal('toggle');
        $('#edit-data').html(data);
        }
    });
});
 


 

$(document).on('click', '#edit_submit', function (e) {
    e.preventDefault();
    
    var pageTitel = $("#pageTitel").val(); 
    $(".small_error").text('');
    var url = $("#edit_url").val(); 
    var formData = new FormData($('#edit_form')[0]); 
    console.log(url);
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
                $("#" + str + "_edit_error").text(val[0]); 
              });
            }else{ 
                $("#edit-modal").modal('toggle'); 
                toastr['success'](
                      'تم التعديل بنجاح ',
                       pageTitel   ,
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