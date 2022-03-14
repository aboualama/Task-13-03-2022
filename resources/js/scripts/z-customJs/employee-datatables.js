/**
 * DataTables Basic
 */

 $(function () {
  'use strict';

  var dt_basic_table = $('.datatables-basic'),
    dt_date_table = $('.dt-date'), 
    assetPath = '../../../app-assets/';

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
  }

  // DataTable with buttons
  // --------------------------------------------------------------------

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
      ajax: '/employee/list/data',
      columns: [
        { data: 'id' },
        { data: 'id' },
        { data: 'first_name', title: 'name' }, // used for sorting so will hide this column
        { data: 'first_name' },
        { data: 'birth_city' },
        { data: 'gender_id' },  
        { data: 'social_status_id' },
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          responsivePriority: 2,
          targets: 0
        },
        {
          // For Checkboxes
          targets: 1,
          orderable: false,
          responsivePriority: 3,
          render: function (data, type, full, meta) {
            return (
              '<div class="custom-control custom-checkbox"> <input class="custom-control-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
              data +
              '" /><label class="custom-control-label" for="checkbox' +
              data +
              '"></label></div>'
            );
          },
          checkboxes: {
            selectAllRender:
              '<div class="custom-control custom-checkbox"> <input class="custom-control-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="custom-control-label" for="checkboxSelectAll"></label></div>'
          }
        },
        {
          targets: 2,
          visible: false
        },
        {
          // Avatar image/badge, Name and post
          targets: 3,
          responsivePriority: 4,
          render: function (data, type, full, meta) {   
             
              var $full_name = full['full_name'], 
                  $national_id = full['national_id'];
      
              var stateNum = full['full_name'];
              var states = ['success', 'danger', 'warning'];
              var $state = states[stateNum],
              $name = $full_name, 
              $initials = $name.match(/./u) || [];   
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              var $output = '<span class="avatar-content">' + $initials + '</span>';
             
            var colorClass = ' bg-light-' + $state ;
            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-left align-items-center">' +
              '<div class="avatar ' +
              colorClass +
              ' mr-1">' +
              $output +
              ' </div>' +
              '<div class="d-flex flex-column">' +
              '<span class="emp_name text-truncate font-weight-bold">' +
              $name +
              '</span>' +
              '<small class="emp_post text-truncate text-muted">' +
              $national_id +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          responsivePriority: 1,
          targets: 4
        }, 
        {    
          // Label    
          targets: 5,
          render: function (data, type, full, meta) {
            var $status_number = full['gender_id'];
            var $status = {
              1: { title: 'ذكر', class: 'badge-light-primary' },
              2: { title: 'انثي', class: ' badge-light-success' }
              };
            if (typeof $status[$status_number] === 'undefined') {
              return data;
            }
            return (
              '<span class="badge badge-pill ' + $status[$status_number].class + '">' + $status[$status_number].title + '</span>'
            );
          }
        }, 
        {    
          // Label
          targets: 6,
          render: function (data, type, full, meta) {
            var $status_number = full['social_status_id'];
            var $status = {
              1: { title: 'اعزب / أنسة', class: 'badge-light-primary' },
              2: { title: 'متزوج / متزوجة', class: ' badge-light-success' },
              3: { title: 'متزوج ويعول', class: ' badge-light-danger' },
              4: { title: 'مطلق / مطلقة', class: 'badge-light-secondary' }, 
              5: { title: 'ارمل / ارملة', class: ' badge-light-warning' }
              };
            if (typeof $status[$status_number] === 'undefined') {
              return data;
            }
            return (
              '<span class="badge badge-pill ' + $status[$status_number].class + '">' + $status[$status_number].title + '</span>'
            );
          }
        }, 
        {
          // Actions
          targets: 7,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            var id = full['id'];
            var name = full['first_name'];
            return (
              '<div class="d-inline-flex">' +
              '<a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-right">' +
              '<a href="/employee/' + id +'/edit" class="dropdown-item">' +
              feather.icons['edit'].toSvg({ class: 'font-small-4 mr-50' }) +
              'تعديل </a>' + 
              '<a href="javascript:;" class="dropdown-item confirm confirm_row_' + id +'" onclick="confirmrow(' + id +')" data-id="' + id +'"  data-route="employee" data-a_name="'+ name +'">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
              'حذف </a>' +
              '</div>' + 
              '</div>' + 
              '<a href="/employee/' + id +'" class="item-edit edit-record" data-id="' + id +'">' +
              feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
              '</a>'  
              // '<a href="/employee_receipt_work/' + id +'" class="item-edit edit-record" data-id="' + id +'">' +
              // feather.icons['file-text'].toSvg({ class: 'font-small-4' }) +
              // '</a>'   
            );
          }
        }
      ],
      order: [[2, 'desc']],
 


      dom:
        '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 10,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {

  

          extend: 'collection',
          className: 'btn btn-outline-secondary dropdown-toggle mr-2',
          text: feather.icons['share'].toSvg({ class: 'font-small-4 mr-50' }) + 'تصدير',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 mr-50' }) + 'Print',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 mr-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 mr-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 mr-50' }) + 'Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            }
          ],
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
            $(node).parent().removeClass('btn-group');
            setTimeout(function () {
              $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
            }, 50);
          }
        }, 


        
        {
          text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'تسجيل موظف  جديد',
          className: 'create-new btn btn-primary',
          attr: {
            'data-toggle': 'modal',
            'data-target': '#new_employee'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        } , 


        
        // {
        //   text: feather.icons['download'].toSvg({ class: 'mr-50 font-small-4' }) + 'تصدير ملف اكسيل',
        //   className: 'btn btn-warning ml-50',
        //   action: function ( e, dt, button, config ) {
        //     window.location = '/export_employees_sheet/';
        //   }, 
        // } 

      ],

      
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              console.log(columns);
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/>').append(data) : false;
          }
        }
      },
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
   
      initComplete: function (full) { 
        // Adding status filter once table initialized  
        this.api()
          .columns(6)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="FilterTransaction" class="form-control text-capitalize mb-md-0 mb-2xx"><option value=""> الحالة الاجتماعية </option></select>'
            )
              .appendTo('.employee_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) { 
                var $status_number = d;
                var $status = {
                  1: { title: 'اعزب', class: 'badge-light-primary' },
                  2: { title: 'متزوج', class: ' badge-light-success' },
                  3: { title: 'مطلق', class: ' badge-light-danger' },
                  4: { title: 'متزوج ويعول', class: 'badge-light-secondary' },
                  5: { title: 'مطلق ويعول', class: ' badge-light-info' },
                  6: { title: 'ارمل ويعول', class: ' badge-light-warning' }
                  };
                  
                select.append('<option value="' + $status[$status_number].title + '" class="text-capitalize">' + $status[$status_number].title + '</option>');
              });
          });
          // Adding plan filter once table initialized
          this.api()
            .columns(4)
            .every(function () {
              var column = this;
              var select = $(
                '<select id="employeePlan" class="form-control text-capitalize mb-md-0 mb-2"><option value="">   محل الميلاد  </option></select>'
              )
                .appendTo('.employee_plan')
                .on('change', function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());
                  column.search(val ? '^' + val + '$' : '', true, false).draw();
                });
  
              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                });
            });
          // Adding status filter once table initialized
          this.api()
            .columns(5)
            .every(function () {
              var column = this;
              var select = $(
                '<select id="FilterTransaction" class="form-control text-capitalize mb-md-0 mb-2xx"><option value="">   النوع </option></select>'
              )
                .appendTo('.employee_status')
                .on('change', function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());
                  column.search(val ? '^' + val + '$' : '', true, false).draw();
                });
  
              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  var $status_number = d;
                  var $status = {
                    1: { title: 'ذكر', class: 'badge-light-primary' },
                    2: { title: 'انثي', class: ' badge-light-success' }
                    };
                    
                  select.append('<option value="' + $status[$status_number].title + '" class="text-capitalize">' + $status[$status_number].title + '</option>');
                });
            });
      }
    });
    $('div.head-label').html('<h6 class="mb-0">قائمة الموظفين</h6>');
  }

  // Flat Date picker
  if (dt_date_table.length) {
    dt_date_table.flatpickr({
      monthSelectorType: 'static',
      dateFormat: 'm/d/Y'
    });
  }
 



  // get info from national_id
  $('#national_id').on("keyup", function (e) {
    e.stopPropagation(); 
    var city = {"01": 'القاهرة', "02": 'الاسكندرية', "03": 'بورسعيد', "04": 'السويس', "11": 'دمياط', "12": 'الدقهليه', "13": 'الشرقية', "14": 'الدقهليه', "15": 'كفر الشيخ',  "16": 'الغربيه', "17": 'المنوفيه', "18": 'البحيره', "19": 'الاسماعليه', "21": 'الجيزه', "22": 'بنى سويف', "23": 'الفيوم', "24": 'المنيا', "25": 'اسيوط', "26": 'سوهاج', "27": 'قنا', "28": 'اسوان', "29": 'الاقصر', "31": 'البحر الاحمر', "32": 'الوادى الجديد', "33": 'مطروح', "34": 'شمال سيناء', "35": 'جنوب سيناء', "88": 'خارج الجمهورية', }; 
    var id = $('#national_id').val();
    var gender = id.substring(13, 1); 
    var year = parseInt((id.substring(0, 1) == 2) ? 1900 : 2000) + parseInt(id.substring(1, 3)); 
    var month = id.substring(3, 5);
    var day = id.substring(5, 7);
    var code = id.substring(7, 9);

    if($(this).val().length > 13)
    {
      $('#gender').val((gender % 2 == 0) ? 'انثي' : 'ذكر');
      $('#birth_city').val(city[code]);
      $('#birth_date').val(year + '-' + month + '-' + day);
    }else{
      $('#gender').val('');
      $('#birth_city').val('');
      $('#birth_date').val('');
    }  
  }); 
 
 

  $('#add_new_employee').on('click', function  (e) {
    e.preventDefault();  
    var url = $("#url").val(); 
    var type = $("#type").val(); 
    var massage = (type == 'edit') ? 'تم التعديل بنجاح' : 'تم اضافة موظف جديد بنجاح ';
 
    var formData = new FormData($('#form')[0]); 
    $.ajax({
        type: 'post', 
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {  
                toastr['success'](
                      massage,
                      '  ادارة الموظفين ' ,
                      {
                        closeButton: true,
                        tapToDismiss: false, 
                        positionClass: 'toast-top-right',
                        rtl: 'rtl'
                      }
                    );     
                    $(".modal input").empty();
                    $('.modal').modal('hide');  
                    setInterval(function(){
                      window.location.reload(1);
                    }, 3000);

        }, error: function (xhr) {

        }
    });  



    // if ($new_name != '') {
    //   dt_basic.row
    //     .add({
    //       responsive_id: null,
    //       id: count,
    //       name: $new_name,
    //       post: $new_post,
    //       email: $new_email,
    //       start_date: $new_date,
    //       salary: '$' + $new_salary,
    //       status: 'active'
    //     })
    //     .draw();
    //   count++;
    //   $('.modal').modal('hide');
    // }س
  });



 

  // change social_status
  $('#social_status').on("change", function (e) { 
    var status = e.target.value; 
    if (status == 'متزوج ويعول' || status == 'ارمل ويعول' || status == 'مطلق ويعول'){
          $('#children_repeater').fadeIn();  
        }else{  
          $('#children_repeater').fadeOut(); 
          $('#children_repeater input').val(''); 
          $('#children_repeater select').val(''); 
        }

});


 

  // change functional_group  in add and edit form
  $('#functional_group_id').on("change", function (e) {
    e.stopPropagation();
    var id = $('#functional_group_id').val();
    $.ajax({
      type: 'GET',
      data: { id: id },
      url: '/get_sub_group/',
      success: function (data) {   
            $('#sub_group_id').empty();
            $('#sub_group_id').append('<option> .........</option>');
            $('.clear_form').fadeOut();  
            $.each(data,function(index,sub_group){
              $('#sub_group_id').append('<option value="'+sub_group.id+'">  '+ sub_group.name +'</option>');
            }) 
      }
    });
  });
  




 

  $('#add_new_qualification').on('click', function  (e) {
    e.preventDefault();   
    var model = $("#model").val();   
    var url = $("#new_qualification_url").val();    
    var formData = new FormData($('#form_qualification')[0]); 
    console.log(model);
    $.ajax({
        type: 'post',  
        url: url,
        data: formData, 
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {  
                toastr['success'](
                      'تم اضافة '  + model +  ' بنجاح ',
                      '  ادارة الموظفين ' ,
                      {
                        closeButton: true,
                        tapToDismiss: false, 
                        positionClass: 'toast-top-right',
                        rtl: 'rtl'
                      }
                    );     
                    $(".modal input").empty();
                    $('.modal').modal('hide');   
                    setInterval(function(){
                      window.location.reload(1);
                    }, 3000);
        }, error: function (xhr) {

        }
    });   
  });


  $('#add_new_job').on('click', function  (e) {
    e.preventDefault();   
    var model = $("#model").val();   
    var url = $("#new_job_url").val();    
    var formData = new FormData($('#form_job')[0]); 
    console.log(model);
    $.ajax({
        type: 'post',  
        url: url,
        data: formData, 
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {  
                toastr['success'](
                      'تم اضافة '  + model +  ' بنجاح ',
                      '  ادارة الموظفين ' ,
                      {
                        closeButton: true,
                        tapToDismiss: false, 
                        positionClass: 'toast-top-right',
                        rtl: 'rtl'
                      }
                    );    

                    $(".modal input").empty();
                    $('.modal').modal('hide');   
                    setInterval(function(){
                      window.location.reload(1);
                    }, 3000);
        }, error: function (xhr) {

        }
    });   
  });
  


  // change functional_group in new job form
  $('#functional_group_new_job_id').on("change", function (e) {
    e.stopPropagation();
    var id = $('#functional_group_new_job_id').val();
    $.ajax({
      type: 'GET',
      data: { id: id },
      url: '/get_sub_group/',
      success: function (data) {   
            $('#sub_group_new_job_id').empty();
            $('#sub_group_new_job_id').append('<option> .........</option>');
            $('.clear_form').fadeOut();  
            $.each(data,function(index,sub_group){
              $('#sub_group_new_job_id').append('<option value="'+sub_group.id+'">  '+ sub_group.name +'</option>');
            }) 
      }
    });
  });

  
});
