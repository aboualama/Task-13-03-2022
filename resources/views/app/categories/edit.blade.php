<form action="#" class="invoice-repeater" id="edit_form">
    @csrf
    {{ method_field('PUT') }}
    <input type="hidden" id="edit_url" value="{{ route($route . '.update', $record->id) }}"">   
    <div class=" row d-flex">
        <div class="col-md-12 col-12">
            <div class="form-group">
                <label for="title" class="text-secondary"> الاسم</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $record->title }}" required />
                <span id="title_edit_error" class="form-text text-secondary small_error"> </span>
            </div>
            <div class="form-group">
                <label for="code" class="text-secondary">   الوصف المختصر</label> 
                <textarea class="form-control" id="description" name="description" required>{{ $record->description }}</textarea> 
                <span id="description_edit_error" class="form-text text-secondary small_error"> </span>
            </div> 
        </div>
    </div>
    <hr />
    <div class="row d-flex">
        <div class="col-12">
            <button class="btn btn-icon btn-success" id="edit_submit" type="submit">
                <span><i data-feather='edit'></i>  تعديل</span>
            </button>
        </div>
    </div>
    </div>
</form>

<script>
    feather.replace()
</script>

