@extends('department.home')
@section('contentPDT')
<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-lg-4 text-center">
            Danh sách Lớp
        </div>
        <div></div>
        <div class="p-lg-4">
            <div class="table-responsive">
                <table class="stripe " id="datatable" >
                  <thead class="">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tên Lớp học</th>
                      <th scope="col" class="row-width-200">Thời gian bắt đầu</th>
                      <th scope="col" class="row-width-200">Thời gian kết thúc</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($classMs as $key => $classDetail)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$classDetail->name}}</td>
                            <td class="row-width-200">{{$classDetail->time_start}}</td>
                            <td >{{$classDetail->time_end}}</td>
                            <td><button class="btn btn-link update-class-detail"   data="{{ route('update-class-view', $classDetail->id) }}">Cập nhật</button></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>

<div id="ajax-class-detail"></div>

<script>
    $(document).ready(function(){
        $('.update-class-detail').each(function(){
            $(this).click(function(){
                console.log($(this).attr('data'))
                $.ajax({
                    url: $(this).attr('data'),
                    success : function(result){
                        $("#ajax-class-detail").html(result)
                    }
                })
            })
        })
    })
</script>
@endsection

 