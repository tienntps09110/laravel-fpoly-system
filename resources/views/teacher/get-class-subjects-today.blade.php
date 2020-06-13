@extends('teacher.home')
@section('content-teacher')
<div class="container-fluid p-4">
    <div class="content box p-lg-5 p-3 ">
        <div class=" mb-lg-3 p-2 text-center alert-primary-neo">
            <h3>Danh sách Lớp </h3>
            <span class="">Hôm nay, ngày {{ $Carbon::now()->format('d/m/Y') }} </span>
        </div>
        <div class="table-responsive" >
            <table class="table text-center">
                <tr> 
                    <th>#</th>
                    <th>Lớp</th>
                    <th>Môn</th>
                    <th class='row-width-300'>Ca</th>
                    <th></th>
                </tr>
                @foreach ($classSubjects as $key => $detailCs)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $detailCs->class_name }}</td>
                        <td>{{ $detailCs->subject_name }}</td>
                        <td>{{ $detailCs->study_time_name }} ({{ $detailCs->study_time_start .' - ' .$detailCs->study_time_end  }})</td>
                        <td>
                            <a class="float-right btn btn-primary-neo" 
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
 
@endsection
