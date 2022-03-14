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
      ajax: '/country/list/data',
      columns: [
        { data: 'id' },
        { data: 'id' },
        { data: 'country_name'}, // used for sorting so will hide this column 
        { data: '' },
        { data: 'phone_code' },
        { data: 'country_code' }, 
        { data: 'continent_name' },
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
             
            var $name = full['country_name'] 
 
              return $name;
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
            return ( 
              '<a href="/country/view/' + id +'" class="item-edit edit-record" data-id="' + id +'">' +
              feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
              '</a>' + 
              '<a href="javascript:;" class="item-edit delete-record" data-id="' + id +'" style="margin-right: 11px; color: red;">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
              '</a>' 
            );
          }
        }
      ],
      order: [[2, 'desc']],




      dom:
        '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 25,
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
          text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'اضافة دولة جديدة',
          className: 'create-new btn btn-primary',
          action: function ( e, dt, button, config ) {
            window.location = '/country/add/';
          },
          // attr: {
          //   'data-toggle': 'modal', 
          //   'data-target': '#modals-slide-in'
          // },
          // init: function (api, node, config) {
          //   $(node).removeClass('btn-secondary');
          // }
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
          .columns(-2)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="FilterTransaction" class="form-control text-capitalize mb-md-0 mb-2xx"><option value=""> اختار القارة </option></select>'
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
    $('div.head-label').html('<h6 class="mb-0">قائمة باسماء الدول</h6>');
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
              url: "/country/" + id,
              method: "DELETE",
              success: function (data) {
                toastr['success'](
                  'تم الحذف بنجاح',
                  ' البلاد ' ,
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
