@extends('department.home')
@section('contentPDT')

<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-2 mb-3  text-center alert-primary-neo">
            Danh sách Lớp học Toàn trường
           
        </div>
         
        <div class="p-lg-4">
            <div class="table-responsive">
                <table class="stripe " id="table_all_classes" >
                  <thead class="">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Lớp học</th>
                      <th scope="col" class="row-width-200">Môn học</th>
                      <th scope="col">Giáo viên phụ trách</th>
                      <th scope="col" class="row-width-200">Thứ học</th>
                      <th scope="col">Ca học</th>
                      <th scope="col">Ngày bắt đầu</th>
                      <th scope="col">ngày kết thúc</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach($classSubjects as $key => $classSubject)
                            {{-- {{ json_encode($classSubject) }} --}}
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$classSubject->class_name }}</td>
                                <td  class="row-width-200">{{$classSubject->subject_name }}</td>
                                <td>{{$classSubject->user_name }}</td>
                                <td class="row-width-200">
                                    @for($i = 0; $i < count(json_decode($classSubject->days_week)); $i++)
                                        <span class="badge badge-pill badge-primary badge-primary-neo" style="">{{ $Core::dayString(json_decode($classSubject->days_week)[$i])}}</span>  
                                    @endfor   
                                </td>
                                <td>{{$classSubject->study_time_name }}</td>
                                <td>{{$classSubject->study_time_start }}</td>
                                <td>{{$classSubject->study_time_end }}</td>
                                <td>
                                    <a class="btn btn-link" href="{{ route('get-class-subject', $classSubject->id) }}">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach 
                        <script>
                            $(document).ready(function(){
                                $('#table_all_classes').DataTable({
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
                                $('#table_all_classes_filter').find('input').addClass('table-input-search');
                                $("select[name='table_all_classes_length']").addClass('length-select');
                            });
                        </script>
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>


@endsection