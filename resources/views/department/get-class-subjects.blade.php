GET ALL CLASS SUBJECTS
<hr>
@foreach($classSubjects as $classSubject)
    {{ json_encode($classSubject) }}
    <hr>
@endforeach