UPDATE STUDENT
<hr>
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
<form  action="{{ route('update-student-put') }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $student->id }}">
    Student code<input type="text" disabled value="{{ $student->student_code }}">
    <br><br>
    full_name<input type="text" name="full_name" value="{{ $student->full_name }}">
    <br><br>
    phone_number<input type="text" name="phone_number" value="{{ $student->phone_number }}">
    <br><br>
    email<input type="text" name="email" value="{{ $student->email }}">
    <br><br>
    avatar_img_path<input type="file" name="avatar_img_path" value="{{ $student->avatar_img_path }}">
    <br><br>
    <button type="submit">Update</button>
</form>