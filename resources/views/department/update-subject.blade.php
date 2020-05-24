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
    <input type="hidden" name="id" value="{{ $subject->id }}">
    Name<input type="text" name="name" value="{{ $subject->name }}">
    <br>
    Code<input type="text" name="code" value="{{ $subject->code }}">
    <button type="submit">Update</button>
</form>