@extends('layouts/detachedLayoutMaster')

@section('title', 'Blog Detail')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
@endsection

 
@section('content')
<!-- Blog Detail -->
<div class="blog-detail-wrapper">
  <div class="row">
    <!-- Blog -->
    <div class="col-12">
      <div class="card">
        <img src="{{ asset('uploads/image/post/'. ($record->image ?? 'default.jpg')) }}" class="img-fluid card-img-top" alt="Blog Detail Pic" />
        <div class="card-body">
          <h4 class="card-title">{{$record->title}}</h4>
          <div class="media">
   
          </div>
          <div class="my-1 py-25">
            <a href="javascript:void(0);">
              <div class="badge badge-pill badge-light-danger mr-50">{{$record->category->title}}</div>
            </a> 
          </div>
          <p class="card-text mb-2">
            {{$record->content}}
          </p> 
         
        </div>
      </div>
    </div>
    <!--/ Blog -->
 
 
  </div>
</div>
<!--/ Blog Detail -->
@endsection
