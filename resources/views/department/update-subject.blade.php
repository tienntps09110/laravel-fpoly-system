{{-- ERROR --}}
<div>
    @if($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</div>

{{-- SUCCESSFULLY --}}
<div>
    {{session('Success')?session('Success'):''}}
</div>
<hr>
<form method="post" action="{{ route('update-subject-put') }}">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="name" class="col-form-label">Tên môn:</label>
        <input type="hidden" name="id" value="{{ $subject->id }}">
        <input class="form-control" type="text" id="name" name="name" value="{{ $subject->name }}">
    </div>
    <div class="form-group">
        <label for="" class="col-form-label">Code:</label>
        <input class="form-control" type="text" name="code" value="{{ $subject->code }}">
    </div>
    <div class="form-group">
        <button class="btn btn-primary-neo" type="submit">Update</button>
    </div>
</form>