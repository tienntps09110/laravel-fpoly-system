<!doctype html>
<html lang="en">

<head>
    <title>Login - Điểm danh online</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <!-- style.css -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/neo-style.css">

    <style>
        body{
            background-color: white;
        }
        .login{
            padding: 30px;
            background-color: rgba(42,64,84);
            border-radius: 4%;
        }
        .login>*{
            color: white;
        }
        #bg{
            height: 100vh;
            position: absolute;
            right:0;
        }
         
    </style>
     
</head>

<body>
    <div id='bg'>
        <img src="images/bg/login-bg-2.jpg" alt="images/bg/login-bg-1.jpg" height="100%">
    </div>
    
    <form method="POST">
        @csrf
        <div class="d-flex" style="height:100vh;">
            <div class=" login col-lg-3 col-md-6 mx-auto align-self-center">

                <div class="text-center text-white" style="font-size:8em">
                    <i class="fas fa-user-circle    "></i>
                </div>
                <div class="text-center text-white">
                    <h2 class="font-weight-bold">ĐIỂM DANH ONLINE</h2>
                </div>
                @if(session('Danger'))
                    <div class="alert alert-danger-neo" style="">
                        {{session('Danger')}}
                    </div>
                @endif
                <div class="my-3" style="">
                    Tên Đăng nhập:
                    <input type="text" name="user_name" id="username" value="{{ $cookieUserName }}" class="form-control">
                </div>
                <div class="my-3">
                    Mật khẩu:
                    <input type="password" name="password" id="password" value="{{ $cookiePassword }}" class="form-control" >
                </div>
                <div>
                    <input type="checkbox" name="remember" id="luu-dang-nhap" checked>
                    <label for="luu-dang-nhap" class="small">Lưu đăng nhập</label>
                    <span class="small float-right">Quên mật khẩu</span>
                </div>
                <div class="my-3 float-right">
                    <button type="submit" class="btn btn-info">Đăng nhập</button>
                </div>
                <div class="my-3">
                    <a href="{{ route('student-login-view') }}" style="font-size: 10pt">> Sinh viên đăng nhập <</a>
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
