 
@extends('department.home')
@section('contentPDT')
<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-2 mb-3  text-center alert-primary-neo">
            Danh sách Môn 
        </div>
        <div></div>
        <div class="p-lg-4">
            <div class="table-responsive">
                <table class="stripe text-center " id="datatable" >
                  <thead class="">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col" class="row-width-200">Tên Môn học</th>
                      <th scope="col" >Mã Môn</th>
                      <th scope="col"  >Fail điểm danh</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($subjects as $key=> $subject)
                        <tr>
                            <td>{{++$key}}</td>
                            <td >{{$subject->name}}</td>
                            <td >{{$subject->code}}</td>
                            <td >{{$subject->days_fail}}</td>
                            <td><button class="btn btn-link update"   data="{{ route('update-subject-view', $subject->id) }}">Cập nhật</button></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>

<div id="ajax-update"></div>

<script>
    $(document).ready(function(){
        $('.update').each(function(){
            $(this).click(function(){
                console.log($(this).attr('data'))
                $.ajax({
                    url: $(this).attr('data'),
                    success : function(result){
                        $("#ajax-update").html(result)
                    }
                })
            })
        })
    })
</script>
@endsection



 