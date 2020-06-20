
@extends('admin.home')
@section('contentAdmin')
    
<div>FORM CREATE USER</div>
<form id="form-create-user">
    User name<input type="text" name="user_name">
    <br>
    Password<input type="password" name="password">
    <br>
    Role<select name="role">
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <br>
    full_name<input type="text" name="full_name">
    <br>
    phone_number<input type="text" name="phone_number">
    <br>
    email<input type="text" name="email">

    <br>
    <button id="submit-create" class="btn btn-primary float-right" type="button">Submit</button>
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