<div class="table-responsive">
    <table class="stripe text-center" id="datatable" >
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
                        <button class="button-update-users btn btn-link" type="button" data="{{ route('update-user-view', $user->uuid) }}">Cập nhật</button>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>

<script>
    $(document).ready(()=>{
    var buttonUpdate = $('.button-update-users');
    buttonUpdate.each(function(){
        $(this).click(function(){
        // console.log($(this).attr('data'))
        $('#view-modal-update').html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
        .attr('style', 'position: fixed; top: 50%; z-index: 2; left: 50%;');
        $.ajax({
            type: 'GET',
            url: $(this).attr('data'),
            success(data){
            // console.log(data)
            $('#view-modal-update').html('').attr('style', '')
            $('#view-modal-update').html(data)
            }
        })
        })
    })
})
</script>

<script src="{{ asset('js/script.js') }}"></script>