@extends('department.home')
@section('contentPDT')

 

<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-lg-4 text-center">
            Danh sách Cán bộ - Giáo viên Toàn trường
           
        </div>
         
        <div class="p-lg-4">
            <div class="table-responsive">
                <table class="stripe " id="table_all_users" >
                  <thead class="">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Họ và tên</th>
                      <th scope="col">Chức vụ</th>
                      <th scope="col">Số điện thoại</th>
                      <th scope="col">Email</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col"> </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <img src="{{$user->avatar_img_path}}" alt="{{$user->avatar_img_path}}" height="100px">
                                </td>
                                <td>
                                    <a href=" " class="btn btn-link">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach 
                        <script>
                            $(document).ready(function(){
                                $('#table_all_users').DataTable({
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
                                $('#table_all_users_filter').find('input').addClass('table-input-search');
                                $("select[name='table_all_users_length']").addClass('length-select');
                            })
                        </script>
                      
                  </tbody>
                </table>
              </div>
        </div>
    </div>
  </div>

 
    
@endsection