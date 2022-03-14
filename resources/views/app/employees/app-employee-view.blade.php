@extends('layouts/contentLayoutMaster')

@section('title', ' عرض بيانات الموظف')

@section('vendor-style')
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css'))}}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}"> 
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">  
@endsection
@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice-list.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}"> 
  <link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}"> 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection

@section('content')
<section class="app-user-view">
  <!-- User Card & Plan Starts -->
  <div class="row">
    <!-- User Card starts-->
    <div class="col-xl-8 col-lg-8 col-md-8">
      <div class="card user-card">
        <div class="card-body">
          <h1 class="mb-2">عرض بيانات الموظف</h1>
          <div class="row">
            <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
              <div class="user-avatar-section">
                <div class="d-flex justify-content-start">
                  {{-- <img
                    class="img-fluid rounded"
                    src="{{asset('images/avatars/7.png')}}"
                    height="104"
                    width="104"
                    alt="User avatar"
                  /> --}}
                  <div class="d-flex flex-column ml-1">
                    <div class="user-info mb-1">
                      <h4 class="mb-0">{{$employee->full_name ?? null}}</h4>
                      <span class="card-text">  {{$employee->national_id ?? null}}</span>
                    </div> 
                    <div class="d-flex flex-wrap">
                      <a data-id="{{ $employee->id }}" class="btn btn-primary" data-toggle="modal" data-target="#edit_employee">تعديل</a>
                      {{-- <button class="btn btn-outline-danger ml-1">Delete</button> --}}
                      <a href="javascript:;" class="btn btn-outline-danger ml-1 confirm confirm_row_{{$employee->id}}" onclick="confirmrow({{$employee->id}})" data-id="{{ $employee->id }}" data-location="10" data-route="employee" data-a_name="{{$employee->full_name}}"> حذف</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center user-total-numbers">
                <div class="d-flex align-items-center mr-2">
                  <div class="color-box bg-light-primary">
                    <i data-feather="dollar-sign" class="text-primary"></i>
                  </div>
                  <div class="ml-1">
                    <h5 class="mb-0">23.3k</h5>
                    <small> الراتب الحالي</small>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="color-box bg-light-success">
                    <i data-feather="trending-up" class="text-success"></i>
                  </div>
                  <div class="ml-1">
                    <h5 class="mb-0">$99.87K</h5>
                    <small>الاجر السنوي </small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
              <div class="user-info-wrapper">
                <div class="d-flex flex-wrap">
                  <div class="user-info-title">
                    <i data-feather="calendar" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">تاريخ الميلاد</span>
                  </div>
                  <p class="card-text mb-0">{{date("Y-m-d", strtotime($employee->birth_date)) ?? null}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="users" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">النوع</span>
                  </div>
                  <p class="card-text mb-0">{{$employee->gender->name ?? null}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="star" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">الحالة الاجتماعية</span>
                  </div>
                  <p class="card-text mb-0">{{$employee->social_status->name ?? null}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="map-pin" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">محل الميلاد</span>
                  </div>
                  <p class="card-text mb-0"> {{ $employee->birth_address . ' - ' . $employee->birth_center . ' - ' . $employee->birth_city ?? null}} </p>
                </div>
                <div class="d-flex flex-wrap">
                  <div class="user-info-title">
                    <i data-feather="phone" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">رقم الهاتف</span>
                  </div>
                  <p class="card-text mb-0">{{$employee->phones->first()->number ?? null}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /User Card Ends-->
 
    
    <!-- Plan Card starts-->
    <div class="col-xl-4 col-lg-4 col-md-4">
      <div class="card plan-card border-primary">
        <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
          <h5 class="mb-0"> عرض بيانات المؤهل الحالي   </h5> 
        </div>
        <div class="card-body">
          <div class="badge badge-light-dark">{{$employee->currently_qualification()->name ?? null}}</div>
          <ul class="list-unstyled my-1"> 
            <li>
              <div class="d-flex flex-wrap">
                <div class="user-info-title w-8">
                  <span class="card-text user-info-title font-weight-bold mb-0 mr-1">  التخصص :</span> 
                </div>
                <p class="card-text mb-0">{{ $employee->currently_qualification()->pivot->qualification_major ?? null}}</p>
              </div>
            </li>
            <li> 
              <div class="d-flex flex-wrap">
                <div class="user-info-title w-8"> 
                  <span class="card-text user-info-title font-weight-bold mb-0">التاريخ :</span>
                </div>
                <p class="card-text mb-0">{{$employee->currently_qualification()->pivot->qualification_date ?? null}}</p>
              </div>  
            </li>
            <li> 
              <div class="d-flex flex-wrap">
                <div class="user-info-title w-8"> 
                  <span class="card-text user-info-title font-weight-bold mb-0">الدور :</span>
                </div>
                <p class="card-text mb-0">{{$employee->currently_qualification()->pivot->qualification_round ?? null}}</p>
              </div>  
            </li>
            <li class="my-25">
              <div class="d-flex flex-wrap">
                <div class="user-info-title w-8">
                  <span class="card-text user-info-title font-weight-bold mb-0 mr-1">  الدرجة   :</span>
                </div>
                <p class="card-text mb-0">{{$employee->currently_qualification()->pivot->qualification_degree ?? null}}</p>
              </div>
            </li>
            <li>
              <div class="d-flex flex-wrap">
                <div class="user-info-title w-8">
                  <span class="card-text user-info-title font-weight-bold mb-0 mr-1">   الجهة :</span>
                </div>
                <p class="card-text mb-0">{{$employee->currently_qualification()->pivot->qualification_source ?? null}}</p>
              </div>
            </li>
          </ul>
          <button class="btn btn-primary text-center btn-block" data-toggle="modal" data-target="#new-qualifaction">اضافة مؤهل جديد  </button>  
        </div>
      </div>
    </div>
  <!-- /Plan CardEnds -->
  </div>
  <!-- User Card & Plan Ends -->

  <!-- User Timeline & Permissions Starts -->
  <div class="row">
    <!-- information starts -->
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title mb-2">الوظائف  </h4>
        </div>
        <div class="card-body">
          <ul class="timeline">
            @forelse ($employee->jobs_history->sortByDesc('created_at') as $jobs) 
              
            <li class="timeline-item">
              <span class="timeline-point timeline-point-indicator 
              timeline-point-@php 
                  $arr=['primary', 'secondary', 'success', 'danger', 'info', 'warning', 'dark'];
                  echo $arr[array_rand($arr, 1)]; 
                @endphp">
              </span>
              @if ($loop->first) 
                <span class="timeline-event-time badge badge-light-success">الوظيفة الحالية</span>
              @endif
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6> {{$jobs->job_function_name ?? null}} - المجموعة {{$jobs->sub_group->functional_group->name ?? null}}  - {{$jobs->sub_group->name ?? null}} </h6>
                  <span class="timeline-event-time">{{date("Y-m-d", strtotime($jobs->join_date)) }}</span>
                </div>
                <p class="{{($loop->last)  ? 'mb-0' : ''}} ">الكادر {{$jobs->cader->name ?? null}} - الدرجة الوظيفية {{$jobs->financial_degree->name ?? null}}.</p>
              </div>
            </li>  

            @empty
               لا يوجد وظائف متاحة
            @endforelse  
          </ul>
        </div>
      </div>
    </div>
    <!-- information Ends -->
    <!-- Plan Card starts-->
      <div class="col-xl-4 col-lg-4 col-md-4">
        <div class="card plan-card border-primary">
          <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
            <h5 class="mb-0"> عرض بيانات الوظيفة الحالية   </h5> 
          </div>
          <div class="card-body">
            <div class="badge badge-light-primary">المجموعة {{$employee->currently_job()->sub_group->functional_group->name ?? null}} - {{$employee->currently_job()->sub_group->name ?? null}}</div>
            <ul class="list-unstyled my-1">
              <li>
                <div class="d-flex flex-wrap">
                  <div class="user-info-title w-11">
                    <span class="card-text user-info-title font-weight-bold mb-0 mr-1">  المسمي الوظيفي :</span>
                  </div>
                  <p class="card-text mb-0">{{$employee->currently_job()->job_function_name ?? null}} {{$employee->currently_job()->id ?? null}}</p>
                </div>
              </li>
              <li class="my-25">
                <div class="d-flex flex-wrap">
                  <div class="user-info-title w-11">
                    <span class="card-text user-info-title font-weight-bold mb-0 mr-1"> اسلوب شغل الوظيفة  :</span>
                  </div>
                  <p class="card-text mb-0">{{$employee->currently_job()->job_style->name ?? null}}</p>
                </div>
              </li>
              <li class="my-25">
                <div class="d-flex flex-wrap">
                  <div class="user-info-title w-11">
                    <span class="card-text user-info-title font-weight-bold mb-0 mr-1">   نوع التعيين  :</span>
                  </div>
                  <p class="card-text mb-0">{{$employee->currently_job()->nomination_type->name ?? null}}</p>
                </div>
              </li>
              <li class="my-25">
                <div class="d-flex flex-wrap">
                  <div class="user-info-title w-11">
                    <span class="card-text user-info-title font-weight-bold mb-0 mr-1"> الكادر  :</span>
                  </div>
                  <p class="card-text mb-0">{{$employee->currently_job()->cader->name ?? null}}</p>
                </div>
              </li>
              <li>
                <div class="d-flex flex-wrap">
                  <div class="user-info-title w-11">
                    <span class="card-text user-info-title font-weight-bold mb-0 mr-1">  الدرجة المالية :</span>
                  </div>
                  <p class="card-text mb-0">{{$employee->currently_job()->financial_degree->name ?? null}}</p>
                </div>
              </li>
              <li>
                <div class="d-flex flex-wrap">
                  <div class="user-info-title w-11">
                    <span class="card-text user-info-title font-weight-bold mb-0 mr-1">  الحالة الوظيفية  :</span>
                  </div>
                  <p class="card-text mb-0">{{$employee->currently_job()->job_status->name ?? null}}</p>
                </div>
              </li>
            </ul>
            <button class="btn btn-primary text-center btn-block" data-toggle="modal" data-target="#new-job">اضافة وظيفة جديدة  </button>  
          </div>
        </div>
      </div>
    <!-- /Plan CardEnds -->
  </div>
  <!-- User Timeline & Permissions Ends -->

  <!-- User Invoice Starts-->
  {{-- <div class="row invoice-list-wrapper">
    <div class="col-12">
      <div class="card">
        <div class="card-datatable table-responsive">
          <table class="invoice-list-table table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th><i data-feather="trending-up"></i></th>
                <th>Client</th>
                <th>Total</th>
                <th class="text-truncate">Issued Date</th>
                <th>Balance</th>
                <th>Invoice Status</th>
                <th class="cell-fit">Actions</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- /User Invoice Ends-->
</section>






<!-- Modal edit_employee -->
<div class="modal fade text-left" id="edit_employee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-secondary" id="myModalLabel17">تعديل بيانات موظف</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">   
          <div class="row">   
            <div class="col-12" >
              <div id="edit-div-model">   
                {{-- <div class="card-body"> --}}
                   @include('app.employees.modal.edit') 
                {{-- </div> --}}
              </div>
            </div> 
          </div> 
        </div> 
    </div>
  </div>
</div> 
<!-- Modal edit_employee-->










<!-- Modal new_qualifaction -->
<div class="modal fade text-left" id="new-qualifaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-secondary" id="myModalLabel17">تعديل البيانات التعليمية لـ:  {{$employee->first_name}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">    
                {{-- <div class="card-body"> --}}
                   @include('app.employees.modal.new-qualifaction') 
                {{-- </div> --}} 
        </div> 
    </div>
  </div>
</div> 
<!-- Modal new_qualifaction-->




<!-- Modal new_job -->
<div class="modal fade text-left" id="new-job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-secondary" id="myModalLabel17">تعديل البيانات الوظيفية لـ:  {{$employee->first_name}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">    
                {{-- <div class="card-body"> --}}
                   @include('app.employees.modal.new-job') 
                {{-- </div> --}} 
        </div> 
    </div>
  </div>
</div> 
<!-- Modal new_job-->


@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/extensions/moment.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>  
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>   
<script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/confirm-delete.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/z-customJs/employee-datatables.js')) }}"></script>  
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script> 
@endsection
 