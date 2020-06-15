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
<script>
    $(document).ready(function(){
        $('.update').each(function(){
            $(this).click(function(){
                // console.log($(this).attr('data'))
                $('#ajax-update')
                .html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
                .attr('style', 'position: fixed; top: 50%; z-index: 2; left: 50%;');
                $.ajax({
                    url: $(this).attr('data'),
                    success : function(result){
                        $("#ajax-update").html('').attr('style', '')
                        $("#ajax-update").html(result)
                    }
                })
            })
        })  
    })
    function loadAjax(component, route){
        component.load(route);
    };
</script>
<script src="{{ asset('/js/script.js') }}"></script>