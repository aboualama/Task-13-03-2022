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
      ajax: '/company/list/data',
      columns: [
        { data: 'id' },
        { data: 'id' },
        { data: 'name', title: 'name' }, // used for sorting so will hide this column 
        { data: '' },
        { data: 'phone' },
        { data: 'zones.length' },
        { data: 'option' }, 
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
            var $logo = full['logo'],
              $name = full['name'],
              $phone = full['phone'];
            if ($logo) {
              // For Avatar image
              var $output =
                '<img src="' + assetPath + 'uploads/image/company/' + $logo + '" alt="Avatar" width="32" height="32">';
            } else {
              // For Avatar badge
              var stateNum = full['status'];
              var states = ['success', 'danger', 'warning'];
              var $state = states[stateNum],
                $name = full['name'],
                // $initials = $name.match(/\b\w/g) || []; 
                $initials = $name.match(/(?<!\p{L}\p{M}*)\p{L}\p{M}*/gu) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-content">' + $initials + '</span>';
            }

            var colorClass = $logo === '' ? ' bg-light-' + $state + ' ' : '';
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
              $phone +
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
          // Actions
          targets: -1,
          title: 'الاعدادات',
          orderable: false,
          render: function (data, type, full, meta) {
            var id = full['id'];
            var name = full['name'];
            return ( 
              '<div class="d-inline-flex">' +
              '<a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-right">' +
              // '<a href="/company/view/' + id +'" class="dropdown-item">' +
              // feather.icons['edit'].toSvg({ class: 'font-small-4 mr-50' }) +
              // 'تعديل </a>' + 
              '<a href="javascript:;" class="dropdown-item confirm confirm_row_' + id +'" onclick="confirmrow(' + id +')" data-id="' + id +'"  data-route="company" data-a_name="'+ name +'">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
              'حذف </a>' +
              '</div>' + 
              '</div>' + 
              '<a href="/company/view/' + id +'" class="item-edit edit-record" data-id="' + id +'">' +
              feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
              '</a>'  
              // '<a href="/company/view/' + id +'" class="item-edit edit-record" data-id="' + id +'">' +
              // feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
              // '</a>' + 
              // '<a href="javascript:;" class="item-edit delete-record" data-id="' + id +'" style="margin-right: 11px; color: red;">' +
              // feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
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
          text: feather.icons['share'].toSvg({ class: 'font-small-4 mr-50' }) + 'اوامر مشتركة',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 mr-50' }) + 'طباعة',
              className: 'dropdown-item',
              exportOptions: { columns: [1,2,3,4] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 mr-50' }) + 'ملف اكسيل',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6] }
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
          text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'اضافة شركة جديدة',
          className: 'create-new btn btn-primary',
          action: function ( e, dt, button, config ) {
            window.location = '/company/add/';
          },
          attr: {
            'data-toggle': 'modal',
            'data-target': '#modals-slide-in'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          },

          
        }
     




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
      initComplete: function () { 
        // Adding status filter once table initialized
        this.api()
          .columns(5)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="FilterTransaction" class="form-control text-capitalize mb-md-0 mb-2xx"><option value=""> اختار عدد المناظق  </option></select>'
            )
              .appendTo('.user_status')
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
      }
    });
    $('div.head-label').html('<h6 class="mb-0">قائمة باسماء شركات الشحن</h6>');
  }

  // Flat Date picker
  if (dt_date_table.length) {
    dt_date_table.flatpickr({
      monthSelectorType: 'static',
      dateFormat: 'm/d/Y'
    });
  }

  // Add New record
  // ? Remove/Update this code as per your requirements ?
  var count = 101;
  $('.data-submit').on('click', function () {
    var $new_name = $('.add-new-record .dt-full-name').val(),
      $new_post = $('.add-new-record .dt-post').val(),
      $new_email = $('.add-new-record .dt-email').val(),
      $new_date = $('.add-new-record .dt-date').val(),
      $new_salary = $('.add-new-record .dt-salary').val();

    if ($new_name != '') {
      dt_basic.row
        .add({
          responsive_id: null,
          id: count,
          name: $new_name,
          post: $new_post,
          email: $new_email,
          start_date: $new_date,
          salary: '$' + $new_salary,
          status: 'active'
        })
        .draw();
      count++;
      $('.modal').modal('hide');
    }
  });







  
  // Delete Record
  $('.datatables-basic tbody').on('click', '.delete-record', function () {
    var tr = dt_basic.row($(this).parents('tr'));
    var id = $(this).data("id");
   
        Swal.fire({
          title: 'هل انت متاكد؟',
          text: "لا يمكنك استعادة ما تم حذفه !",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'نعم , قم بالحذف',
          cancelButtonText: 'إلغاء',
          confirmButtonClass: 'btn btn-primary',
          cancelButtonClass: 'btn btn-danger ml-1',
          buttonsStyling: false,
        }).then(function (result) {
          if (result.value) { 
            $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url: "/company/" + id,
              method: "DELETE",
              success: function (data) {
                toastr['success'](
                  'تم الحذف بنجاح',
                  ' الشركات ' ,
                  {
                    closeButton: true,
                    tapToDismiss: false, 
                    positionClass: 'toast-top-right',
                    rtl: 'rtl'
                  }
                );
                tr.remove().draw();
              },
              error: function (data) {
                console.log('Error:');
              }
            });
          }
          else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
              title: 'إلغاء الامر ',
              text: 'مازال الوضع امن :)',
              type: 'error',
              confirmButtonClass: 'btn btn-success',
            })
          }
        })  
  });

  // Edit Record
  $('.datatables-basic tbody').on('click', '.edit-record', function () { 
    var id = $(this).data("id");
 
    console.log('Error:', id);

  });

 
 
});
