@extends('teacher.home')
@section('content-teacher')
GET ALL CLASS SUBJECTS FOR TEACHER
<hr>

<div class="row">
    @foreach ($classSubjects as $detailCs)
        <div class="col-12">
            <div class="alert alert-primary">
                <h2>Lớp: {{ $detailCs->class_name }}</h2>
                <h2>Môn: {{ $detailCs->subject_name }}</h2>
                <h2>Thời gian: {{ $Carbon::parse($detailCs->datetime_start)->toDateString() .' - ' .$Carbon::parse($detailCs->datetime_end)->toDateString() }}</h2>
                <h2>Ca học: {{ $detailCs->study_time_name }}</h2>
                <h2>Thứ học: 
                    @for($i = 0; $i < count(json_decode($detailCs->days_week)); $i++)
                        {{ $Core::dayString(json_decode($detailCs->days_week)[$i]) .', ' }}
                    @endfor
                
                </h2>
                <a href="{{ route('get-class-subject-teacher', $detailCs->id) }}">Thông tin</a>

                
            </div>
        </div>
        <hr>
    @endforeach
</div>
@endsection