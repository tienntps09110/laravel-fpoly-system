@extends('teacher.home')
@section('content-teacher')
      <div class="container">
        <div class="alert alert-warning"><h3 class="text-center">ĐIỂM DANH</h3></div>
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
        {{-- DANGER --}}
        @if(session('Danger'))
        <div class="alert alert-danger font-weight-bold text-center">
            {{ session('Danger') }}
        </div>
        @endif
        {{-- SUCCESSFULLY --}}
        @if(session('Success'))
        <div class="alert alert-success font-weight-bold text-center">
            {{ session('Success') }}
        </div>
        @endif
        <form method="post" action="{{ route('attendance-students-post') }}">
            @csrf
            <div class="row">
                @foreach ($students as $student)
                    <div class="col-12">
                        <div class="alert">
                            <h6 class="float-left">{{ $student->student_code }}| </h6>
                            <h3 class="float-left">{{ $student->full_name }}</h3>
                            <img class="float-left" style="width:10%" src="{{ $student->avatar_img_path }}" alt="{{ $student->student_code }}">
                            {{-- INPUT ATTENDANCE --}}
                            <input type="checkbox" name="attendance[]" value="{{ $student->id }}" class="float-right">
                        </div>
                    </div>
                @endforeach
            </div>
            <input type="hidden" name="days_class_subject_id" value="{{ $classSubject->dcs_id }}">
            <input type="hidden" name="class_id" value="{{ $classSubject->class_id }}">
            <input type="hidden" name="study_time_id" value="{{ $classSubject->study_time_id }}">
            <button type="submit" class="btn btn-success float-right" {{ $timeOut=='false'?'':'disabled' }}>Điểm danh</button>
        </form>
      </div>
 @endsection