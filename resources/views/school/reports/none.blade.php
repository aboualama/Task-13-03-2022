@extends('layouts/contentLayoutMaster')

@section('title', ' تقارير عهدة')

@section('content') 

<!-- Content types -->
<section id="card-content-types"> 
  {{-- <h6 class="my-2 text-muted">  لا يوجد تقارير حتي الان</h6> --}}
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="card text-center">
        {{-- <div class="card-header"> العهدة </div> --}}
        <div class="card-body">
          <h4 class="card-title">عهدة | {{ $custody_type->name }} </h4>
          <h4 class="card-title">لا يوجد تقارير لهذا النوع من العهدة حتي الان</h4>
          <p class="card-text">ربما لم يتم اضافة عهدة او تم اختيار عام دراسي مختلف.</p>
          <a href="/custodies" class="btn btn-primary">يمكنك اضافة عهدة جديدة من هنا </a>
        </div>
        <div class="card-footer text-muted">
          <a href="/" class="btn btn-outline-primary">عودة الي الصفحة الرئيسية </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Content types -->
 
 
@endsection
