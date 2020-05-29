{{-- <h1>THÔNG TIN MÔN HỌC CỦA LỚP</h1>
{{ json_encode($cLassSubject) }}

<h1>THÔNG TIN NGÀY HỌC</h1>

@foreach ($daysClassSubject as $daysDetail)
    {{ json_encode($daysDetail) }}
    <hr>
@endforeach --}}
@extends('student.home')
@section('content-student')

{{-- {{ json_encode($cLassSubject) }} --}}
<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-4 font-weight-bold">
            Chi tiết Môn: <span class="display-4 font-weight-bold ml-4" id="ten-mon">{{ $cLassSubject->subject_name }} </span>
            <span class="material-icons" id='backward'>exit_to_app</span>
        </div>
        <div class="row pb-3">
            {{-- {{ json_encode($cLassSubject) }} --}}
            <div class="col-3 p-3 text-center ">Ngày bắt đầu:</div>
            <div class="col-3 p-3 text-center">{{ $cLassSubject->datetime_start }}</div>
            <div class="col-3 p-3 text-center">Ngày bắt đầu:</div>
            <div class="col-3 p-3 text-center"> {{ $cLassSubject->datetime_end }}</div>
            <div class="col-3 p-3  text-center">Giáo viên phụ trách:</div>
            <div class="col-3 p-3 text-center">{{ $cLassSubject->user_full_name }}</div>
            <div class="col-3 p-3 text-center">Lớp học:</div>
            <div class="col-3 p-3 text-center">{{ $cLassSubject->class_name }}</div>
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
                        <td>{{ ++$key }}</td>
                        <td>Thứ 2 ngày {{ $daysDetail->date }}</td>
                        <td>{{ $cLassSubject->study_time_name }} - {{ $cLassSubject->study_time_start }} đến {{ $cLassSubject->study_time_end }}</td>
                        <td>{{ $daysDetail->user_full_name }}</td>
                        <td class="{{ $daysDetail->checked =="false" ? "badge badge-danger" :"badge badge-success"  }}" > {{ $daysDetail->checked =="false" ? "Chưa Dạy" :"Đã dạy" }} </td>
                    </tr>
                @endforeach    
            </table>
        </div>
    </div>
</div>

@endsection
 