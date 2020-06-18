<div class="table-responsive">
    <table class="stripe " id="datatable" >
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
                <td class="text-center">
                    <img src="{{$student->avatar_img_path}}" alt="{{$student->avatar_img_path}}" height="100px">
                </td>
                <td>
                    <button class="button-update-student btn btn-link" type="button" data="{{ route('update-student', $student->id) }}">Cập nhật</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
$(document).ready(()=>{
    var buttonUpdate = $('.button-update-student');
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

<script src="{{ asset('/js/script.js') }}"></script>
