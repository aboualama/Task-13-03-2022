/*=========================================================================================
	File Name: sweet-alerts.js
	Description: A beautiful replacement for javascript alerts
	----------------------------------------------------------------------------------------
	Item name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: weeneet
	Author URL:
==========================================================================================*/
 



function confirmrow(i) {
  var modal = $('.confirm_row_'+ i).data("route");
  var C_modal = $('.confirm_row_'+ i).data("a_name");
  var row = $('.confirm_row_'+ i).parents('tr'); 
   
  console.log(row);
  var location = $('.confirm_row_'+ i).data("location");
    Swal.fire({
      title: 'هل انت متاكد من حذف ' + C_modal ,
      text: "لا يمكن استرجاع ما تم حذفه!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم احذف',
      cancelButtonText: 'الغاء الامر',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) { 
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: "/" + modal + "/" + i,
          method: "DELETE",
          success: function (data) {
            toastr['success']( 'تم حذف ' + C_modal + '  بنجاح ', C_modal , {closeButton: true, tapToDismiss: false,  positionClass: 'toast-top-right', rtl: 'rtl'});  
            if(location == 10){
                window.location.href = "/" + modal + "/list"; 
            }
            row.fadeOut();  
 
          },
          error: function (data) {
            console.log('Error:');
          }
        });
      }
      else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'تم الغاء الامر ',
          text: 'مازلت محتفظ بكافة البيانات :)',
          type: 'error',
          confirmButtonClass: 'btn btn-success',
          confirmButtonText: 'تم',
        })
      }
    })
  // });
}



function confirmrow2(i) {
  var modal = $('.confirm2').data("route");
  var C_modal = $('.confirm2').data("a_name"); 
   var td = $('.confirmrow2_' + i);
    Swal.fire({
      title: 'هل انت متاكد من حذف ' + C_modal ,
      text: "لا يمكن استرجاع ما تم حذفه!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم احذف',
      cancelButtonText: 'الغاء الامر',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) { 
        $.ajax({
          url: "/" + modal + "/" + i,
          method: "DELETE",
          success: function (data) { 
            toastr['success']( 'تم حذف ' + C_modal + '  بنجاح ', C_modal , {closeButton: true, tapToDismiss: false,  positionClass: 'toast-top-right', rtl: 'rtl'});  
            td.fadeOut();
          },
          error: function (data) {
            console.log('Error:');
          }
        });
      }
      else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'تم الغاء الامر ',
          text: 'مازلت محتفظ بكافة البيانات :)',
          type: 'error',
          confirmButtonClass: 'btn btn-success',
          confirmButtonText: 'تم',
        })
      }
    })
  // });
}
