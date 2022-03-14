
@extends('layouts/contentLayoutMaster')

@section('title', 'الرئيسية')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}"> 
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}"> 
  @endsection

@section('content')
<!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">


  <div class="row match-height">
    <!-- Greetings Card starts -->
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="card card-congratulations">
        <div class="card-body text-center">
          <img
            src="{{asset('images/elements/decore-left.png')}}"
            class="congratulations-img-left"
            alt="card-img-left"
          />
          <img
            src="{{asset('images/elements/decore-right.png')}}"
            class="congratulations-img-right"
            alt="card-img-right"
          />
          <div class="avatar avatar-xl bg-primary shadow">
            <div class="avatar-content">
              <img style="margin-bottom: 8px;"
              src="{{asset('uploads/image/setting/')}}/{{$setting->logo}}" 
            />
            </div>
          </div>
          <div class="text-center">
            <h1 class="mb-1 text-white">صباح الخير {{Auth::user()->name}}</h1>
            <p class="card-text m-auto w-75">
              تمنياتنا بيوم جديد مليئ بالنجاح والتوفيق تمنياتنا بيوم جديد مليئ بالنجاح والتوفيق.
            </p>
            <p class="card-text m-auto w-75" style="text-align: left;">
              <strong>أحمد رشدي</strong>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Greetings Card ends -->

    <!-- Subscribers Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i data-feather="users" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder mt-1">{{$users->count()}}</h2>
          <p class="card-text">عدد المستخدمين</p>
        </div>
        <div id="gained-chart"></div>
      </div>
    </div>
    <!-- Subscribers Chart Card ends -->

    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="truck" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder mt-1">{{$companies->count()}}</h2>
          <p class="card-text">عدد شركات الشحن</p>
        </div>
        <div id="order-chart"></div>
      </div>
    </div>
    <!-- Orders Chart Card ends -->
  </div>


  
  {{-- <div class="row match-height">  
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between pb-0">
          <h4 class="card-title">عروض الاسعار</h4>
          <div class="dropdown chart-dropdown">
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-12 d-flex flex-column flex-wrap text-center">
              <h1 class="font-large-2 font-weight-bolder mt-2 mb-0"><i class="font-large-2" data-feather="truck"></i></h1> 
              <p class="card-text">Tickets</p>
              
              <button type="button" class="btn btn-primary">اطلب سعر الان</button>
            </div>
        
          </div>
 
        </div>
      </div>
    </div>  
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between pb-0">
          <h4 class="card-title">عروض الاسعار</h4>
          <div class="dropdown chart-dropdown">
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-12 d-flex flex-column flex-wrap text-center">
              <h1 class="font-large-2 font-weight-bolder mt-2 mb-0"><i class="font-large-2" data-feather="dollar-sign"></i></h1> 
              <p class="card-text">Tickets</p>
              
              <button type="button" class="btn btn-primary">اطلب سعر الان</button>
            </div>
        
          </div>
 
        </div>
      </div>
    </div>  
  </div> --}}
 
</section>
<!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script> 
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pages/dashboard-analytics.js')) }}"></script> 
@endsection
