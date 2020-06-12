@extends('student.home')
@section('content-student')

{{-- {{ json_encode($classSubject) }} --}}
<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-4 font-weight-bold">
            Chi tiết Môn: <span class="display-4 font-weight-bold ml-4" id="ten-mon">{{ $classSubject->subject_name }} </span>
            <a href="{{ route('get-class-subjects-student') }}" id='backward'><i class="fas fa-sign-out-alt    "></i></a>
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
            <div class="col-3 p-3 text-center">Số ngày nghỉ tối đa:</div>
            <div class="col-3 p-3 text-center">{{ $classSubject->subject_days_fail }} ngày</div>
            <div class="col-3 p-3 text-center">Số ngày nghỉ hiện tại:</div>
            <div class="col-3 p-3 text-center">{{ $countdayStudy }} ngày</div>
        </div>
        <div class="px-5">
            <table class="table table-center" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ngày học</th>
                        <th>Ca học</th>
                        <th>Giảng viên</th>
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
                            <td class="{{ $daysDetail->checked =="false" ? "badge badge-danger-neo" :"badge badge-success-neo"  }}" > {{ $daysDetail->checked =="false" ? "Chưa Dạy" :"Đã dạy" }} </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>

            <script>
                    $(document).ready(function(){
                        $('#datatable').DataTable({
                            language:{
                                sProcessing: 'Đang xử lý...',
                                sLengthMenu: 'Xem _MENU_ mục',
                                sZeroRecords: 'Không tìm thấy dòng nào phù hợp',
                                sInfo: 'Đang xem <b> _START_ </b> đến <b> _END_ </b> trong tổng số <b> _TOTAL_ </b> mục',
                                sInfoEmpty: 'Đang xem 0 đến 0 trong tổng số 0 mục',
                                sInfoFiltered: '(được lọc từ _MAX_ mục)',
                                sInfoPostFix: '',
                                sSearch: 'Tìm:',
                                sUrl: '',
                                oPaginate: {
                                    sFirst: 'Đầu',
                                    sPrevious: 'Trước',
                                    sNext: 'Tiếp',
                                    sLast: 'Cuối'
                                }
                            }
                        });
                        $('#datatable_filter').find('input').addClass('table-input-search');
                        $("select[name='datatable_length']").addClass('length-select');
                    })
            </script>
        </div>
    </div>
</div>

@endsection
 