@extends('teacher.home')
@section('content-teacher')
<div class="container-fluid p-4">
        <div class="content box p-5">
            <div class="table-responsive">
                <table class="table">
                    <h3 >Danh sách lớp dạy  <span class="float-right">{{ $Carbon::now()->format('d/m/Y') }} </span> </h3>
                    <tr> 
                        <th>#</th>
                        <th>Lớp</th>
                        <th>Môn</th>
                        <th class='text-center'>Ca</th>
                        <th></th>
                    </tr>
                    @foreach ($classSubjects as $key => $detailCs)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $detailCs->class_name }}</td>
                            <td>{{ $detailCs->subject_name }}</td>
                            <td class='text-center'>{{ $detailCs->study_time_name }} ({{ $detailCs->study_time_start .' - ' .$detailCs->study_time_end  }})</td>
                            <td>
                                <a class="float-right btn btn-primary" 
                                    href="
                                            {{ route(
                                                $detailCs->checked == 'true'?'get-attendance-class-subject-update-today': 'get-attendance-class-subject-today',[
                                                    'classSubjectId'=>$detailCs->id,
                                                    'dayStudyId'=>$detailCs->day_study_id
                                                ]) 
                                            }}
                                        "
                                >{{ $detailCs->checked == 'true'?'Chỉnh sửa': 'Điểm danh' }}</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>

<!-- <div class="row">
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
</div> -->
@endsection
