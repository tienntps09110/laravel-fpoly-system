<div class="table-responsive">
    <table class="stripe " id="datatable" >
      <thead class="">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên Lớp học</th>
          <th scope="col">Mã Lớp học</th>
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
                <td>{{$classDetail->code}}</td>
                <td class="row-width-200">{{$Carbon::parse($classDetail->time_start)->toDateString()}}</td>
                <td >{{$Carbon::parse($classDetail->time_end)->toDateString()}}</td>
                <td><button class="btn btn-link update-class-detail"   data="{{ route('update-class-view', $classDetail->id) }}">Cập nhật</button></td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>

<script>
    $(document).ready(function(){
        $('.update-class-detail').each(function(){
            $(this).click(function(){
                // console.log($(this).attr('data'))
                $('#ajax-class-detail')
                .html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
                .attr('style', 'position: fixed; top: 50%; z-index: 2; left: 50%;');
                $.ajax({
                    url: $(this).attr('data'),
                    success : function(result){
                        $("#ajax-class-detail").html('').attr('style', '')
                        $("#ajax-class-detail").html(result)
                    }
                })
            })
        })
    })
</script>
<script src="{{ asset('/js/script.js') }}"></script>
