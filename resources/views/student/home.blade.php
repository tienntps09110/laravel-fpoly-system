<!doctype html>
<html lang="en">
  <head>
    <title>HOME STUDENT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1> HOME</h1>
        <form action="{{ route('student-logout') }}" method="POST">
            @csrf
            <button type="submit">LOGOUT ({{ $Core::user()->full_name }})</button>
        </form>
        <br>
        <div class="row">
            <div class="col-3">
                <img src="{{ $Core::user()->avatar_img_path }}" alt="{{ $Core::user()->student_code }}">
            </div>
            <div class="col-9">
                <h3>Lớp: {{ $classM->name }} ({{ $classM->time_start }} - {{ $classM->time_end }})</h3>
                <h3>MSSV: {{ $Core::user()->student_code }}</h3>
                <h3>Họ và tên: {{ $Core::user()->full_name }}</h3>
                {{-- <h3>{{ $Core::user()}}</h3> --}}
            </div>
        </div>

        <br>
        <a href="{{ route('get-class-subjects-student') }}" style="font-size: 20pt">>>Danh sách môn học</a>
        <br>
        <a href="{{ route('get-class-subjects-days-student') }}" style="font-size: 20pt">>>Danh sách ngày học của môn học</a>
        
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>