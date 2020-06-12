@extends('department.home')
@section('contentPDT')
<div class="container-fluid  p-4">
    <div class="box p-4">
       
        {{-- {{ json_encode($cLassSubject) }} --}}

        <div class="title p-lg-4 ">
            THÔNG TIN & CẬP NHẬT MÔN HỌC : <span class="font-weight-bold ml-4" id="ten-mon"> {{ $cLassSubject->subject_name }} </span>
            <a id='backward' href="{{ route('get-class-subjects') }}"><i class="fas fa-sign-out-alt    "></i></a>
        </div>
        <div class="row pb-3">
            {{-- {{ json_encode($cLassSubject) }} --}}
            <div class="col-lg-3    p-lg-3 p-1   text-center">Lớp:</div>
            <div class="col-lg-3    p-lg-3 p-1  text-center font-weight-bold"><span   id="ten-mon">{{ $cLassSubject->class_name }} </span></div>
            <div class="col-lg-3    p-lg-3 p-1   text-center">Giảng viên phụ trách:</div>
            <div class="col-lg-3    p-lg-3 p-1  text-center font-weight-bold">{{ $cLassSubject->user_full_name }} </div>
            <div class="col-lg-3    p-lg-3 p-1 text-center ">Ngày bắt đầu:</div>
            <div class="col-lg-3    p-lg-3 p-1  text-center font-weight-bold">{{ $Carbon::parse($cLassSubject->datetime_start)->format('d/m/Y') }} </div>
            <div class="col-lg-3    p-lg-3 p-1   text-center">Ngày kết thúc:</div>
            <div class="col-lg-3    p-lg-3 p-1   text-center font-weight-bold"> {{ $Carbon::parse($cLassSubject->datetime_end)->format('d/m/Y') }}  </div>
            <div class="col-lg-3    p-lg-3 p-1   text-center">Ca học:</div>
            <div class="col-lg-3    p-lg-3 p-1   text-center font-weight-bold"> {{ $cLassSubject->study_time_name }} (  {{ $cLassSubject->study_time_start }} - {{ $cLassSubject->study_time_end }} )</div> 
            <div class="col-lg-3    p-lg-3 p-1   text-center">Thứ học:</div>
            <div class="col-lg-3    p-lg-3 p-1   text-center font-weight-bold">
                @for($i = 0; $i < count(json_decode($cLassSubject->days_week)); $i++)
                    <span class="badge badge-pill badge-primary badge-primary-neo" style="">{{ $Core::dayString(json_decode($cLassSubject->days_week)[$i])}}</span>  
                @endfor 
            </div> 
        </div>
        <div class="p-lg-4">
            <div class="table-responsive">
                <table class="stripe " id="table_detail_subject_class" >
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="row-width-200">Giáo viên</th>
                            <th scope="col" class="row-width-200">Ngày học</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daysClassSubject as $key => $daysDetail)
                        <tr>
                            <td>{{++$key}}</td>
                            <td class="row-width-200">{{ $daysDetail->user_full_name }}</td>
                            <td  class="row-width-200">  {{ $Carbon::parse($daysDetail->date)->format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-link"  href="{{ route('update-day-class-subject-view', $daysDetail->id) }}">Đổi người dạy</a>
                            </td>
                        </tr>
                        @endforeach 
                        <script>
                            $(document).ready(function(){
                                $('#table_detail_subject_class').DataTable({
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
                                $('#table_detail_subject_class_filter').find('input').addClass('table-input-search');
                                $("select[name='table_detail_subject_class_length']").addClass('length-select');
                                
                                if($('body').width() < 1000){
                                    $(".title").next().children(':even').css("background-color","aliceblue");
                                }
                                
                            })
                        </script>
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
 


 

@endsection