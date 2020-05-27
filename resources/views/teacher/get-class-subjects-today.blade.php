<h3 style="text-align: center">TODAY {{ $Carbon::now()->toDateString() }}</h3>
<hr>
<div class="row">
    @foreach ($classSubjects as $detailCs)
        <div class="col-12">
            <div class="alert alert-primary">
                <h2>Lớp: {{ $detailCs->class_name }}</h2>
                <h2>Môn: {{ $detailCs->subject_name }}</h2>
                <h2>Ca: {{ $detailCs->study_time_name }} ( {{ $detailCs->study_time_start .' - ' .$detailCs->study_time_end  }}  )</h2>
                <a href="{{ route('get-class-subject-teacher', $detailCs->id) }}">Thông tin</a>

                <a class="float-right" 
                    href="
                            {{ route(
                                $detailCs->checked == 'true'?'get-attendance-class-subject-update-today': 'get-attendance-class-subject-today',[
                                    'classSubjectId'=>$detailCs->id,
                                    'dayStudyId'=>$detailCs->day_study_id
                                ]) 
                            }}
                        "
                >{{ $detailCs->checked == 'true'?'Chỉnh sửa': 'Điểm danh' }}</a>
            </div>
        </div>
        <hr>
    @endforeach
</div>