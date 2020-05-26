GET ALL CLASS SUBJECTS FOR TEACHER
<hr>
@foreach($classSubjects as $classSubject)
    {{ json_encode($classSubject) }}
    <hr>
@endforeach