@extends('layouts/contentLayoutMaster')

@section('title', 'لوحة التحكم')

@section('vendor-style')  
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">     
    <style>
      .modal-body {
        max-height: calc(70vh);
        overflow-y: auto;
      }
    </style>
@endsection
@section('page-style')  
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}"> 
  @endsection

@section('content') 
 
  <section id="dashboard-analytics">


    <div class="row match-height">
      <!-- Greetings Card starts -->
      <div class="col-lg-12 col-md-12 col-sm-12">
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
            <span class="brand-logo"> 
              <img src="{{asset('uploads/image/setting/')}}/{{Helper::settings()->logo}}" style="padding: 5px; margin: 20px auto; display: block; max-width: 10%; border-radius: 10px;"> 
            </span>
            <div class="text-center">
              <h1 class="mb-1 text-white"> مرحبا بك "{{Auth::user()->name}}" في برنامج {{Helper::settings()->name}}  </h1>
              <p class="card-text m-auto w-75">
                تمنياتنا بيوم جديد مليئ بالنجاح والتوفيق باذن الله .
              </p> 
            </div>
          </div>
        </div>
      </div>
    </div> 
  
 
 
  </section> 

 

@endsection

@section('vendor-script')  
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script> 
@endsection
@section('page-script')  
 
 
@endsection
