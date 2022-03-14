<form action="#" class="invoice-repeater" id="edit_form">
    @csrf
    {{ method_field('PUT') }}
    <input type="hidden" id="edit_url" value="{{ route($route . '.update', $record->id) }}"">   
    <div class=" row d-flex">
        <div class="col-md-12 col-12">
            <div class="form-group">
                <label for="name" class="text-secondary"> الاسم</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $record->name }}" required />
                <span id="name_edit_error" class="form-text text-secondary small_error"> </span>
            </div>
            <div class="form-group">
                <label for="code" class="text-secondary"> الرقم الكودي</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $record->code }}" required />
                <span id="code_edit_error" class="form-text text-secondary small_error"> </span>
            </div>
            @if ($route == 'subGroup') 
              <div class="form-group"> 
                  <label for="functional_group_id" class="text-secondary">  المجموعة الوظيفية</label>
                  <select class="form-control" name="functional_group_id" id="functional_group_id" > 
                      @foreach ($groups as $group) 
                        <option value="{{$group->id}}" {{($record->functional_group->id == $group->id) ? 'selected'  : '' }}>{{$group->name}}</option> 
                      @endforeach
                  </select>
                  <span id="code_error" class="form-text text-secondary small_error"> </span> 
              </div>
            @endif
        </div>
    </div>
    <hr />
    <div class="row d-flex">
        <div class="col-12">
            <button class="btn btn-icon btn-success" id="edit_submit" type="submit">
                <span>تعديل</span>
            </button>
        </div>
    </div>
    </div>
</form>
