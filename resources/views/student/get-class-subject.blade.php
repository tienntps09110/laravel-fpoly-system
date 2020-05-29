{{-- <h1>THÔNG TIN MÔN HỌC CỦA LỚP</h1>
{{ json_encode($classSubject) }}

<h1>THÔNG TIN NGÀY HỌC</h1>

@foreach ($daysClassSubject as $daysDetail)
    {{ json_encode($daysDetail) }}
    <hr>
@endforeach --}}
@extends('student.home')
@section('content-student')

{{-- {{ json_encode($classSubject) }} --}}
<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-4 font-weight-bold">
            Chi tiết Môn: <span class="display-4 font-weight-bold ml-4" id="ten-mon">{{ $classSubject->subject_name }} </span>
            <span class="material-icons" id='backward'>exit_to_app</span>
        </div>
        <div class="row pb-3">
            {{-- {{ json_encode($classSubject) }} --}}
            <div class="col-3 p-3 text-center ">Ngày bắt đầu:</div>
            <div class="col-3 p-3 text-center">{{ $Carbon::parse($classSubject->datetime_start)->format('d/m/Y') }}</div>
            <div class="col-3 p-3 text-center">Ngày kết thúc:</div>
            <div class="col-3 p-3 text-center"> {{ $Carbon::parse($classSubject->datetime_end)->format('d/m/Y') }}</div>
            <div class="col-3 p-3  text-center">Giáo viên phụ trách:</div>
            <div class="col-3 p-3 text-center">{{ $classSubject->user_full_name }}</div>
            <div class="col-3 p-3 text-center">Lớp học:</div>
            <div class="col-3 p-3 text-center">{{ $classSubject->class_name }}</div>
            <div class="col-3 p-3 text-center">Số ngày nghỉ:</div>
            <div class="col-3 p-3 text-center">{{ $countdayStudy }} ngày</div>
        </div>
        <div class="px-5">
            <table class="table table-center">
                <tr>
                    <th>#</th>
                    <th>Ngày học</th>
                    <th>Ca học</th>
                    <th>Giảng viên</th>
                    <th>abc</th>
                    
                </tr>
                @foreach ($daysClassSubject as $key=> $daysDetail)
                {{-- {{ json_encode($daysDetail) }} --}}
                    <tr>
                        {{-- KEY --}}
                        <td>{{ ++$key }}</td>

                        {{-- DAY OF WEEK AND DATE STUDY --}}
                        <td>{{ $Carbon::parse($daysDetail->date)->format('d/m/Y') }} ({{ $Core::dayString(json_decode( $Carbon::parse($daysDetail->date)->dayOfWeek)) }})</td>

                        {{-- TIME STUDY --}}
                        <td>{{ $classSubject->study_time_name }} - {{ $classSubject->study_time_start }} đến {{ $classSubject->study_time_end }}</td>

                        {{-- TEACHER NAME --}}
                        <td>{{ $daysDetail->user_full_name }}</td>

                        {{-- STATUS STUDY --}}
                        <td class="{{ $daysDetail->checked =="false" ? "badge badge-danger" :"badge badge-success"  }}" > {{ $daysDetail->checked =="false" ? "Chưa Dạy" :"Đã dạy" }} </td>
                    </tr>
                @endforeach    
            </table>
        </div>
    </div>
</div>

@endsection
 