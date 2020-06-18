<div class="table-responsive">
    <table class="stripe " id="datatable" >
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
                        <button class="btn btn-link button-change-teacher"  data="{{ route('update-day-class-subject-view', $daysDetail->id) }}">Đổi người dạy</button>
                    </td>
                </tr>
            @endforeach
      </tbody>
    </table>
</div>

<div id="ajax-update"></div>
<script>
    $(document).ready(function(){
        // console.log(resultAjaxSuccess)
        var buttonChangeTeacher = $('.button-change-teacher');
        buttonChangeTeacher.each(function(){
            $(this).click( ()=> {
                $('#ajax-update')
                .html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
                .attr('style', 'position: fixed; top: 50%; z-index: 2; left: 50%;');
                $.ajax({
                    method: 'GET',
                    url: $(this).attr('data'),
                    success(data){
                        // console.log(data)
                        $('#ajax-update').html('').attr('style', '')
                        $('#ajax-update').html(data)
                    }
                })
            })
        })		
    })
</script>
<script src="{{ asset('/js/script.js') }}"></script>
