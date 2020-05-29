UPDATE DAY CLAS SUBJECT
{{-- ERROR  --}}
<div>
    @if($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</div> 
{{-- SUCCESSFULLY  --}}
<div>
    {{session('Success')?session('Success'):''}}
</div> 
<form action="{{ route('update-day-class-subject-put') }}" method="POST">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $dayClassSubject->id }}">
    <input type="hidden" name="class_subject_id" value="{{ $dayClassSubject->class_subject_id }}">

    <select name="user_manager_uuid" >
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher->uuid }}" {{ $teacher->uuid == $dayClassSubject->user_manager_uuid?'selected':'' }}>{{ $teacher->full_name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">UPDATE</button>
</form>