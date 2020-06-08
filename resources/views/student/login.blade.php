<!doctype html>
<html lang="en">

<head>
    <title>Login - Điểm danh online</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <!-- style.css -->
    <link rel="stylesheet" href="../../css/styles.css">

    <style>
        .login{
            padding: 30px;
            background-color: rgba(42,64,84);
            border-radius: 4%;
        }
        .login>*{
            color: white;
        }
    </style>
     
</head>

<body>
    <div>
        @if($errors->any())
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
    </div>
    
    @if(session('Danger'))
    <div class="alert alert-warning" style="position:fixed; right:10%; top:10%">
        {{session('Danger')}}
    </div>
    @endif
    <form method="POST" action="{{ route('student-login-post') }}">
        @csrf
        <div class="d-flex" style="height:100vh;">
            <div class=" login col-lg-3 mx-auto align-self-center">

                <div class="text-center text-white" style="font-size:8em">
                    <i class="fas fa-user-circle    "></i>
                </div>
                <div class="text-center text-white">
                    <h2 class="font-weight-bold">ĐĂNG NHẬP HỌC SINH</h2>
                </div>
                <div class="my-3">
                    Mã số sinh viên:
                    <input type="text" name="student_code" value="{{ $cookieStudentCode }}" id="student_code" class="form-control" value="ps09110">
                </div>
                <div class="my-3">
                    Mật khẩu:
                    <input type="password" name="password" value="{{ $cookieStudentPassword }}" id="password" class="form-control" value="1">
                </div>
                <div>
                    <input type="checkbox" name="remember" id="luu-dang-nhap" checked>
                    <span class="small">Lưu đăng nhập</span>
                    <span class="small float-right">Quên mật khẩu</span>
                </div>
                <div class="my-3 float-right">
                    <button type="submit" class="btn btn-info">Đăng nhập</button>
                </div>
            </div>
        </div>
    </form> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>

</html>


<!-- <div>
    {{session('Danger')?session('Danger'):''}}
</div>
<form method="POST">
    @csrf
    <input type="text" name="user_name">
    <br>
    <input type="password" name="password">
    <br>
    <button type="submit">LOGIN</button>
</form> -->
