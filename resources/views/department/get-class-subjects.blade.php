GET ALL CLASS SUBJECTS
<hr>
@foreach($classSubjects as $classSubject)
    {{ json_encode($classSubject) }}
    <div>
    <h1>{{ $classSubject->class_name }}</h1>
        <a href="{{ route('get-class-subject', $classSubject->id) }}">Chi tiết</a>
    </div>
    <hr>
@endforeach