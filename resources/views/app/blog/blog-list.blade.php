@extends('layouts/detachedLayoutMaster')

@section('title', $pageTitel)

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
@endsection
 

@section('content')

 
 

<!-- Blog List -->
<div class="blog-list-wrapper">

<!-- Search bar -->
  <div class="col-12">
    <div class="form-group"> 
      <form class="d-flex" action="{{ route('search') }}" method="POST">
        @csrf 
          <input type="text" class="form-control" placeholder="Search here" name="search"/> 
          <button class=" btn btn-primary" type="submit">
            <i data-feather="search"></i></button>
        </div>
    </form>
    </div>
  </div>

  <!-- Blog List Items --> 
  <div class="row">
    
    @forelse ($records as $record) 
      <div class="col-md-6 col-12 confirm_block_{{$record->id}}">
        <div class="card">
          <a href="{{ route('post.show', $record->id) }}">
            <img class="card-img-top img-fluid" src="{{ asset('uploads/image/post/'. ($record->image ?? 'default.jpg')) }}" alt="Blog Post pic" />
          </a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{ route('post.show', $record->id) }}" class="blog-title-truncate text-body-heading">
                {{$record->title}}
              </a>
            </h4> 
            <div class="my-1 py-25">
              <a href="javascript:void(0);">
                <div class="badge badge-pill badge-light-info mr-50">{{$record->category->title}}</div>
              </a> 
            </div>
            <p class="card-text blog-content-truncate">
               {{Str::words($record->content, 20, $end='   .......  ')}}
            </p> 
          </div>                  
          <div class="d-flex justify-content-between" style="float: left; padding:2%">
            <a href="{{route('post.edit', $record->id)}}" class="btn-sm btn btn-success"  > <i data-feather="edit"></i>  تعديل</a> 
            <button style="" class="btn-sm btn btn-danger confirm confirm_row_{{$record->id}}" onclick="confirmrow({{$record->id}})" data-id="{{$record->id}}" data-route="{{$route}}" data-a_name="{{$record->title}}"> <i data-feather="trash-2"></i>  حذف</button> 
          </div>       
        </div>     
      </div>
    @empty
      .............
    @endforelse
 
  </div>
  <!--/ Blog List Items -->

 
</div>
<!--/ Blog List -->



 

@endsection
 
 