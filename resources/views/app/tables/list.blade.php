
@extends('layouts/contentLayoutMaster')

@section('title', $pageTitel)

@section('vendor-style') 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}"> 
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">   
@endsection

@section('page-style') 
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}"> 
  <link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}">  
@endsection 
 
@section('content')
  
<div class="row" id="table-hover-animation">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> {{$pageTitel}}</h4>
        <input type="hidden" id="pageTitel" value="{{$pageTitel}}">   
      </div>
      <div class="card-body">
        <p class="card-text">  
            جدول لعرض وتعديل وحذف {{$pageTitel}} والرقم الكودي لكل نوع
        </p>
      </div>
      
      <div class="table-responsive">
        <div >
          <button type="submit" class="create-new btn btn-primary ml-2 mb-2 waves-effect waves-float waves-light" data-toggle="modal" data-target="#add_new">  اضافة عنصر جديد </button> 
        </div> 
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>الاسم</th>
              <th>الرقم الكودي</th> 
              @if ($pageTitel == 'المجموعات النوعية')
              <th>  المجموعة الوظيفية </th> 
              @endif
              <th class="text-center">الاعدادات</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($records as $record) 
                <tr>
                    <td>{{$record->name}}</td>
                    <td>{{$record->code}}</td>  
                    @if ($pageTitel == 'المجموعات النوعية')
                    <td>  {{$record->functional_group->name}} </td> 
                    @endif
                    <td class="text-center"> 
                      <button class="btn-sm  btn btn-success waves-effect waves-float waves-light action-edit" data-id="{{$record->id}}" data-route="{{$route}}"> <i data-feather='edit'></i>  تعديل </button> 
                      <button class="btn-sm  btn btn-danger waves-effect waves-float waves-light action-delete2 confirm confirm_row_{{$record->id}}" onclick="confirmrow({{$record->id}})" data-id="{{$record->id}}" data-route="{{$route}}" data-a_name="{{$record->name}}"> <i data-feather="trash-2"></i>  حذف</button> 
                     
                    </td>
                </tr>
            @endforeach
          
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 




<!--add_new Modal -->
<div class="modal fade text-left" id="add_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-secondary" id="myModalLabel17">أضافة عنصر جديد</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">   
            <div class="row">   
              <div class="col-12">
                <div class="card"> 
                  <div class="card-body">
                    <form action="#" class="invoice-repeater" id="new_form"> 
                      <input type="hidden" id="url" value="/{{$route}}">   
                      <div class="row d-flex">     
                        <div class="col-md-12 col-12">
                            <div class="form-group"> 
                              <label for="name" class="text-secondary"> الاسم</label>
                              <input type="text" class="form-control" id="name" name="name" value="" placeholder=" " required/>
                              <span id="name_error" class="form-text text-secondary small_error"> </span> 
                            </div>
                            <div class="form-group"> 
                                <label for="code" class="text-secondary"> الرقم الكودي</label>
                                <input type="text" class="form-control" id="code" name="code" value=""  placeholder=" " required/>
                                <span id="code_error" class="form-text text-secondary small_error"> </span> 
                            </div>
                            @if ($pageTitel == 'المجموعات النوعية') 
                              <div class="form-group"> 
                                  <label for="functional_group_id" class="text-secondary">  المجموعة الوظيفية</label>
                                  <select class="form-control" name="functional_group_id" id="functional_group_id" > 
                                    <option  value="">.........  </option>
                                      @foreach ($groups as $group) 
                                        <option value="{{$group->id}}">{{$group->name}}</option> 
                                      @endforeach
                                  </select>
                                  <span id="code_error" class="form-text text-secondary small_error"> </span> 
                              </div>
                            @endif
                        </div>   
                        <hr />  
                        <div class="row d-flex">     
                            <div class="col-12">  
                                <button class="btn btn-icon btn-primary" id="new_submit" type="submit"> 
                                <i data-feather="plus"></i>
                                <span>اضافة</span>
                                </button>
                            </div> 
                        </div> 
                      </div>   
                    </form>
                  </div>
                </div>
              </div> 
            </div> 
          </div> 
      </div>
    </div>
  </div> 
  <!-- Modal -->





  
{{-- edit Modal --}}
<div class="col-12">
    <div class="row">
      <div class="modal-size-lg mr-1 mb-1 d-inline-block">
        <div class="modal fade text-left" id="edit-modal" tabindex="-1" role="dialog"
          aria-labelledby="myModalLabel17" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row">   
                  <div class="col-12">
                    <div class="card"> 
                      <div class="card-body">
                        <div id="edit-data"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection 

@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>  
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>    
@endsection  


@section('page-script') 
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script> 
  <script src="{{ asset(mix('js/scripts/confirm-delete.js')) }}"></script>  
  <script src="{{ asset(mix('js/scripts/z-customJs/add-edit-data.js')) }}"></script>   
 
@endsection   
