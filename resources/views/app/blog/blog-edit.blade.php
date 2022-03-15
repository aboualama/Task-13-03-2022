
@extends('layouts/contentLayoutMaster')

@section('title', $pageTitel)

@section('vendor-style')
  <link rel="stylesheet" href="{{asset(mix('vendors/css/forms/select/select2.min.css'))}}">
  <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/katex.min.css'))}}">
  <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/monokai-sublime.min.css'))}}">
  <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/quill.snow.css'))}}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/plugins/forms/form-quill-editor.css'))}}">
<link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/pages/page-blog.css'))}}">
@endsection

@section('content')
<!-- Blog Edit -->
<div class="blog-edit-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> {{$pageTitel}}</h4>
          <input type="hidden" id="pageTitel" value="{{$pageTitel}}">   
        </div>
        <div class="card-body">
 
          <!-- Form --> 
          <form action="javascript:;" class="mt-2" id="edit_form">
            @csrf
            {{ method_field('PUT') }}
            <input type="hidden" id="url" value="{{route('post.update', $record->id)}}">    

            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group mb-2">
                  <label for="blog-edit-title">العنوان</label>
                  <input
                    type="text"
                    id="blog-edit-title"
                    class="form-control"
                    name="title" value="{{ $record->title }}"
                  />
                  <span id="title_error" class="form-text text-secondary small_error"> </span> 
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group mb-2">
                  <label for="blog-edit-category">التصنيف</label>
                  <select id="blog-edit-category" class="select2 form-control" name="category_id"> 
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}" {{($record->category->id == $category->id) ? 'selected' : ''}}>{{$category->title}}</option>  
                    @endforeach
                  </select>
                </div> 
              </div>
 
              <div class="col-md-6 col-12">
                <div class="form-group mb-2">
                  <label for="blog-edit-status">الحالة</label>
                  <select class="form-control" id="blog-edit-status" name="status">
                    <option value="Published" {{($record->status == "Published") ? 'selected' : ''}}>Published</option>
                    <option value="Pending" {{($record->status == "Pending") ? 'selected' : ''}}>Pending</option>
                    <option value="Draft" {{($record->status == "Draft") ? 'selected' : ''}}>Draft</option>
                  </select>
                </div> 
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label>المحتوي</label>
                  <div id="blog-editor-wrapper">
                    <div id="blog-editor-container">
                      <div class="editor">
                        {{ $record->title }}
                      </div>
                    </div>
                  </div>
                  <span id="content_error" class="form-text text-secondary small_error"> </span> 
                </div>
              </div>

              <div class="col-12 mt-1">
                <div class="form-group">
                  <label></label>
                  <div id="g-editor-wrapper">
                    <div id="blog-editr-container">
                      <div class="">
                        <br>  
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div class="col-12 mb-2">
                <div class="border rounded p-2">
                  <h4 class="mb-1">الصورة الرئيسية</h4>
                  <div class="media flex-column flex-md-row">
                    <img src="{{ asset('uploads/image/post/'. ($record->image ?? 'default.jpg')) }}" id="blog-feature-image"
                      class="rounded mr-2 mb-1 mb-md-0"
                      width="170"
                      height="110"
                      alt="Blog Image"
                    />
                    <div class="media-body">
                      <h5 class="mb-2 mt-2"> اختار صورة :</h5> 
                      <p class="my-50">
                       </p>
                      <div class="d-inline-block">
                        <div class="form-group mb-0">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" name="image"/>
                            <label class="custom-file-label" for="blogCustomFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <span id="image_error" class="form-text text-secondary small_error"> </span> 
              </div>
              <div class="col-12 mt-50">
                <button type="submit" id="edit_submit" class="btn btn-primary mr-1"> تعديل</button>
                <button type="reset" class="btn btn-outline-secondary">إلغاء</button>
              </div>
            </div>
          </form>
          <!--/ Form -->
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Blog Edit -->
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/select/select2.full.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/katex.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/highlight.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/quill.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>   
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/page-blog-edit.js'))}}"></script>
<script src="{{ asset(mix('js/scripts/confirm-delete.js')) }}"></script>   

<script>
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}}); 
 
 $(document).on('click', '#edit_submit', function (e) {
     e.preventDefault();
     
     var editor = $('.editor').text();  
     var pageTitel = $("#pageTitel").val(); 
     $(".small_error").text('');
     var url = $("#url").val(); 
     console.log(url);
     var formData = new FormData($('#edit_form')[0]); 
         formData.append('content', editor);
     $.ajax({
         type: 'post',
         enctype: 'multipart/form-data',
         url: url,
         data: formData,
         processData: false,
         contentType: false,
         cache: false,
         success: function (data) { 
             if (data.status == 442){
               $.each(data.errors, function (key, val) {
                 var newchar = '_'
                 var str = key.split('.').join(newchar); 
                 $("#" + str + "_error").text(val[0]); 
               });
             }else{  
                 toastr['success'](
                       'تم التعديل بنجاح ',
                       pageTitel   ,
                       {
                         closeButton: true,
                         tapToDismiss: false, 
                         positionClass: 'toast-top-right',
                         rtl: 'rtl'
                       }
                     );    
                 setInterval(function(){ 
                   window.location.href = "{{route('post.index')}}"; 
                 }, 3000);
             }
         }, error: function (xhr) {
 
         }
     });
 });
 
</script>
@endsection

 