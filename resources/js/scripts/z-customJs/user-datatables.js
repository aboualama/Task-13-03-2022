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
      ajax: '/user/list/data',
      columns: [
        { data: 'id' },
        { data: 'id' },
        { data: 'name', title: 'name' }, // used for sorting so will hide this column
        { data: 'name' },
        { data: 'email' }, 
        { data: 'name' },
        { data: 'status' },
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
            var $user_img = full['avatar'],
              $name = full['name'],
              $phone = full['phone'];
            if ($user_img) {
              // For Avatar image
              var $output =
                '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
            } else {
              // For Avatar badge
              var stateNum = full['status'];
              var states = ['success', 'danger', 'warning'];
              var $state = states[stateNum],
                $name = full['name'],
                // $initials = $name.match(/\b\w/g) || []; 
                // $initials = $name.match(/(?<!\p{L}\p{M}*)\p{L}\p{M}*/gu) || [];  // 2 letters
                $initials = $name.match(/./u) || [];  // 1 letters
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-content">' + $initials + '</span>';
            }

            var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
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
          // Label
          targets: -2,
          render: function (data, type, full, meta) {
            var $status_number = full['status'];
            var $status = {
                "مفعل"    : { title: 'مفعل', class: 'badge-light-primary' },
                "غير مفعل": { title: 'غير مفعل', class: ' badge-light-success' },
                معلق      : { title: 'معلق', class: ' badge-light-danger' }
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
          targets: -1,
          title: 'Actions',
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
              '<a href="javascript:;" class="dropdown-item edit-record"  data-id="' + id +'"  data-route="user" >' +
              feather.icons['edit'].toSvg({ class: 'font-small-4 mr-50' }) +
              'تعديل </a>' + 
              '<a href="javascript:;" class="dropdown-item confirm confirm_row_' + id +'" onclick="confirmrow(' + id +')" data-id="' + id +'"  data-route="user" data-a_name="'+ name +'">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
              'حذف </a>' +
              '</div>' + 
              '</div>' + 
              '<a href="/user/view/' + id +'" class="item-edit" data-id="' + id +'">' +
              feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
              '</a>'   
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
          text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'تسجيل مستخدم جديد',
          className: 'create-new btn btn-primary',
          attr: {
            'data-toggle': 'modal',
            'data-target': '#modals-slide-in'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
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
      initComplete: function (full) { 
        // Adding status filter once table initialized  
        this.api()
          .columns(-2)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="FilterTransaction" class="form-control text-capitalize mb-md-0 mb-2xx"><option value=""> اختار الحالة </option></select>'
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
    $('div.head-label').html('<h6 class="mb-0">قائمة المستخدمين</h6>');
  }

  // Flat Date picker
  if (dt_date_table.length) {
    dt_date_table.flatpickr({
      monthSelectorType: 'static',
      dateFormat: 'm/d/Y'
    });
  }

 
  
  // Delete Record
  $('.datatables-basic tbody').on('click', '.delete-record', function () {
    dt_basic.row($(this).parents('tr')).remove().draw();
    var id = $(this).data("id");
  
            console.log('Error:', id); 

  });

  // Edit Record
  $('.datatables-basic tbody').on('click', '.edit-record', function (e) { 
    var id = $(this).data("id");
  
            console.log('Error:', id);
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

 
 
});
