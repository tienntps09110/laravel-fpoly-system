CREATE CLASS SUBJECT
<hr>
<div>
    @if($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</div>
<div>
    {{session('Danger')?session('Danger'):''}}
</div>
<div>
    {{session('Success')?session('Success'):''}}
</div>
<br>
<form method="post">
    @csrf
    CLASS
    <select name="class_id">
        <option selected disabled>Chọn lớp</option>
        @foreach ($class as $classDetail)
            <option value="{{ $classDetail->id }}">{{ $classDetail->name }}</option>
        @endforeach
    </select>
    <br><br>
    SUBJECT<select name="subject_id">
        <option selected disabled>Chọn môn</option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
    <br><br>
    TEACHER<select name="teacher_id">
        <option selected disabled>Chọn giảng viên</option>
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher->uuid }}">{{ $teacher->full_name }} ({{ $teacher->user_name }})</option>
        @endforeach
    </select>
    <br><br>
    STUDY TIME<select name="study_time_id">
        <option selected disabled>Chọn ca học</option>
        @foreach ($studyTime as $studyTimeDetail)
            <option value="{{ $studyTimeDetail->id }}">{{ $studyTimeDetail->name }} ({{ $studyTimeDetail->time_start . ' - ' .$studyTimeDetail->time_end }})</option>
        @endforeach
    </select>
    <br><br>
    DATE TIME START<input type="date" name="datetime_start">
    <br>
    DATE TIME END<input type="date" name="datetime_end">
    <br>
    <button type="submit" >Create</button>
</form>