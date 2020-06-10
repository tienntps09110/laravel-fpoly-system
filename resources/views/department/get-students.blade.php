@extends('department.home')
@section('contentPDT')
 

<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-lg-4 text-center">
            Danh sách Sinh viên Toàn trường
           
        </div>
         
        <div class="p-lg-4">
            <div class="table-responsive">
                <table class="stripe " id="table_all_students" >
                  <thead class="">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Mã số</th>
                      <th scope="col" class="row-width-200">Họ và tên</th>
                      <th scope="col">Giới tính</th>
                      <th scope="col">Lớp</th>
                      {{-- <th scope="col" class="row-width-200">Bắt đầu khóa</th>
                      <th scope="col" class="row-width-200">Kết thúc khóa</th> --}}
                      <th scope="col">Số điện thoại</th>
                      <th scope="col">Email</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $key => $student)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$student->student_code}}</td>
                            <td class="row-width-200">{{$student->full_name}}</td>
                            <td >{{$student->sex}}</td>
                            <td>{{$student->class->name}}</td>
                            {{-- <td class="row-width-200">{{$student->class->time_start}}</td>
                            <td class="row-width-200">{{$student->class->time_end}}</td> --}}
                            <td>{{$student->phone_number}}</td>
                            <td>{{$student->email}}</td>
                            <td>
                                <img src="{{$student->avatar_img_path}}" alt="{{$student->avatar_img_path}}" height="100px">
                            </td>
                            <td>
                                <a href="{{ route('update-student', $student->id) }}" class="btn btn-link">Cập nhật</a>
                            </td>
                        </tr>
                    @endforeach
                        <script>
                            $(document).ready(function(){
                                $('#table_all_students').DataTable({
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
                                $('#table_all_students_filter').find('input').addClass('table-input-search');
                                $("select[name='table_all_students_length']").addClass('length-select');
                            })
                        </script>
                      
                  </tbody>
                </table>
              </div>
        </div>
    </div>
  </div>

  

    
@endsection