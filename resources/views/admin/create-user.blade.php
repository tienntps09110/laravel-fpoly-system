
@extends('admin.home')
@section('contentAdmin')
    
<form id="form-create-user">
    <div class="px-lg-5">
        <div class="container-fluid py-3">
            <div class="box cong-cu-phan-lop p-4">
                <h3 class="alert-success-neo mx-lg-4 p-2 text-center">Tạo thành viên</h3> 
                <div class="">
                    <div class="row">
                        <div class="col-lg-4 px-lg-5 py-lg-4 py-2">
                            <label for="user_name"> <span class="px-3 font-weight-bold" >1</span>  Tên đăng nhập    </label> 
                            <input type="text" id="user_name" name="user_name" class="form-control">
                        </div>
                        <div class="col-lg-4 px-lg-5 py-lg-4 py-2">
                            <label for="password"> <span class="px-3 font-weight-bold" >2</span>  Mật khẩu </label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="col-lg-4 px-lg-5 py-lg-4 py-2">
                            <label for="role"> <span class="px-3 font-weight-bold" >3</span> Các Thứ học trong tuần   </label>
                            <select name="role" id="role" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 px-lg-5 py-lg-4 py-2">
                            <label for="full_name"> <span class="px-3 font-weight-bold" >4</span> Họ và tên</label>
                            <input type="text" name="full_name" id="full_name" class="form-control">
                        </div>
                        <div class="col-lg-4 px-lg-5 py-lg-4 py-2">
                            <label for="phone_number"> <span class="px-3 font-weight-bold" >5</span> Số điện thoại</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control">
                        </div>
                        <div class="col-lg-4 px-lg-5 py-lg-4 py-2">
                            <label for="email"> <span class="px-3 font-weight-bold" >6</span> Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-lg-4 px-5 py-2">
                        </div>
                        <div class="col-lg-4 px-5 py-2">
                        </div>
                        <div class="col-lg-4 px-5 py-2">
                            <label for=" ">  &nbsp; </label>
                            <button id="submit-create" class="btn btn-primary-neo float-right" type="button">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(()=> {
        $('#submit-create').click(()=>{
            // console.log('he')
            let form = $('#form-create-user')
            let userName    = form.find('input[name="user_name"]')
            let password    = form.find('input[name="password"]')
            let role        = form.find('select[name="role"]')
            let fullName    = form.find('input[name="full_name"]')
            let phoneNumber = form.find('input[name="phone_number"]')
            let email       = form.find('input[name="email"]')
            // console.log({userName, password, role, fullName, phoneNumber, email})
            $.ajax({
                type: 'POST',
                url: '{{ route('create-user-post') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_name: userName.val(),
                    password: password.val(),
                    role: role.val(),
                    full_name: fullName.val(),
                    phone_number: phoneNumber.val(),
                    email: email.val()
                },
                success(data){
                    // console.log(data)
                    if(data.Status == 200){
                        toastMess (data.Message);
                        userName.val('')
                        password.val('')
                        role.val('')
                        fullName.val('')
                        phoneNumber.val('')
                        email.val('')
                    }else{
                        if(typeof data.Message == 'object'){
                            $.each(data.Message, function(key, value){
                                toastMess (this, 5000,'error');
                            });
                        }else{
                           toastMess (data.Message, 5000,'error');
                        }
                    }
                },
                error(data){
                    console.log(data)
                }
            })
        });
    });
</script>
@endsection