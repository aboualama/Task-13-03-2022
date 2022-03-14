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
              <img src="{{asset('uploads/image/setting/')}}/{{$settings->logo}}" style="padding: 5px; margin: 20px auto; display: block; max-width: 10%; border-radius: 10px;">
            </span>
            <div class="text-center">
              <h1 class="mb-1 text-white">صباح الخير {{Auth::user()->name}}</h1>
              <p class="card-text m-auto w-75">
                تمنياتنا بيوم جديد مليئ بالنجاح والتوفيق باذن الله .
              </p>
              <p class="card-text m-auto w-75" style="text-align: left; margin-top: 10px !important;">
                <strong>مديرة الكلية: {{$settings->manger}}</strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row match-height">
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="card  bg-primary text-white">
          <div class="card-header">
            <div>
              <h2 class="font-weight-bolder mb-0 text-white">{{$settingByyear->agents ??  0}}</h2>
              <p class="card-text">عدد الوكيلات   </p>
            </div>
            <div class="avatar  bg-primary bg-lighten-2 p-50 m-0">
              <div class="avatar-content">
                <i data-feather="users" class="font-medium-5  text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="card  bg-success text-white">
          <div class="card-header">
            <div>
              <h2 class="font-weight-bolder mb-0 text-white">{{$settingByyear->administrators ??  0}}</h2>
              <p class="card-text">عدد الاداريات   </p>
            </div>
            <div class="avatar  bg-success bg-lighten-2 p-50 m-0">
              <div class="avatar-content">
                <i data-feather="users" class="font-medium-5  text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="card  bg-info text-white">
          <div class="card-header">
            <div>
              <h2 class="font-weight-bolder mb-0 text-white">{{$settingByyear->teachers ??  0}}</h2>
              <p class="card-text">عدد المعلمات   </p>
            </div>
            <div class="avatar  bg-info bg-lighten-2 p-50 m-0">
              <div class="avatar-content">
                <i data-feather="users" class="font-medium-5  text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="card  bg-warning text-white">
          <div class="card-header">
            <div>
              <h2 class="font-weight-bolder mb-0 text-white">{{$students_count ??  0}}</h2>
              <p class="card-text">عدد الطالبات   </p>
            </div>
            <div class="avatar  bg-warning bg-lighten-2 p-50 m-0">
              <div class="avatar-content">
                <i data-feather="users" class="font-medium-5  text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row match-height">

      <div class="col-lg-12 col-12">
        <div class="card card-statistics bg-dark text-white">
          <div class="card-body statistics-body text-center">

            <section id="divider-text-position" style="width: 70%; margin: auto;">
              <div class="row">
                <div class="col-md-12">
                    <div class="divider divider-success">
                      <h1 class="divider-text text-success text-lighten-2">    الرقم الوزاري</h1>
                    </div>
                </div>
              </div>
            </section>
            <div class="row">
              <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-2 mb-md-0">
                <div class="media">
                  <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-1 text-info">{{$settingByyear->primary_no ??  0}}</h4>
                    <p class="card-text font-small-8 mb-0">قسم الابتدائي</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-2 mb-md-0">
                <div class="media">
                  <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-1 text-info">{{$settingByyear->middle_no ??  0}}</h4>
                    <p class="card-text font-small-8 mb-0">قسم المتوسط</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-2 mb-sm-0">
                <div class="media">
                  <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-1 text-info">{{$settingByyear->secondary_no ??  0}}</h4>
                    <p class="card-text font-small-8 mb-0">قسم الثانوي</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    {{-- <div class="row match-height">

      @foreach ($allcategories as $category)

      <div class="col-lg-6 col-sm-12 col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between pb-0">
            <h1 class="card-title">تقارير </h1>
            <div class="dropdown chart-dropdown">
            </div>

          <section id="divider-text-position" style="width: 98%; margin: auto;">
            <div class="row">
              <div class="col-md-12">
                  <div class="divider divider-left divider-{{$loop->odd ? "warning" : "info"}}">
                    <h1 class="divider-text text-{{$loop->odd ? "warning" : "info"}}">     {{$category->name}}</h1>
                  </div>
              </div>
            </div>
          </section>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-12 d-flex flex-column flex-wrap">

                <div class="row">
                  @forelse ($category->types as $index => $type)
                    <div class="col-md-6 col-sm-12 col-12">
                      <div class=" ">
                        <button type="trash"  class="model btn btn-icon btn-{{$loop->odd ? "warning" : "info"}} m-2 p-2" style="width: 80%; margin: 1.5rem auto !important; display: block; "  data-id="{{$type->id}}">
                          {{$type->name}}
                        </button>
                      </div>
                    </div>
                  @empty
                    -------
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endforeach

    </div> --}}



  </section>



@endsection

@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')


@endsection
