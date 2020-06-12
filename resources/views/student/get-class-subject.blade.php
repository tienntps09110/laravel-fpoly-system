@extends('student.home')
@section('content-student')

{{-- {{ json_encode($classSubject) }} --}}
<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-lg-4 font-weight-bold">
            Chi tiết Môn: <span class="display-4 font-weight-bold ml-lg-4" id="ten-mon">{{ $classSubject->subject_name }} </span>
            <a href="{{ route('get-class-subjects-student') }}" id='backward'><i class="fas fa-sign-out-alt    "></i></a>
        </div>
        <div class="row py-3 mt-2 ">
            {{-- {{ json_encode($classSubject) }} --}}
            <div class="col-lg-3 p-lg-3 p-1 text-center ">Ngày bắt đầu:</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center font-weight-bold ">{{ $Carbon::parse($classSubject->datetime_start)->format('d/m/Y') }}</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center">Ngày kết thúc:</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center font-weight-bold"> {{ $Carbon::parse($classSubject->datetime_end)->format('d/m/Y') }}</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center">Giáo viên phụ trách:</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center font-weight-bold">{{ $classSubject->user_full_name }}</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center">Lớp học:</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center font-weight-bold">{{ $classSubject->class_name }}</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center">Số ngày nghỉ tối đa:</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center font-weight-bold">{{ $classSubject->subject_days_fail }} ngày</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center">Số ngày nghỉ hiện tại:</div>
            <div class="col-lg-3 p-lg-3 p-1 text-center font-weight-bold">{{ $countdayStudy }} ngày</div>
        </div>

        <div class="px-lg-5">
            <div class="table-responsive">
                <table class="stripe " id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ngày học</th>
                            <th class="row-width-300">Ca học</th>
                            <th class="row-width-200"> Giảng viên</th>
                            <th> </th>
                            
                        </tr>
                    </thead>
                    <tbody>
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
                                <td class="{{ $daysDetail->checked =="false" ? "text-danger" :" text-success "  }}" > {{ $daysDetail->checked =="false" ? "Chưa Dạy" :"Đã dạy" }} </td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
 