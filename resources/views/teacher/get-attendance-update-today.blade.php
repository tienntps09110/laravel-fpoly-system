
<!doctype html>
<html lang="en">
  <head>
    <title>UPDATE ATTENDANCE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <div class="alert alert-warning"><h3 class="text-center">ĐIỂM DANH</h3></div>
        <hr>
        {{-- ERROR --}}
        <div>
            @if($errors->any())
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif
        </div>
        {{-- DANGER --}}
        @if(session('Danger'))
        <div class="alert alert-danger font-weight-bold text-center">
            {{ session('Danger') }}
        </div>
        @endif
        {{-- SUCCESSFULLY --}}
        @if(session('Success'))
        <div class="alert alert-success font-weight-bold text-center">
            {{ session('Success') }}
        </div>
        @endif
        <form method="post" action="{{ route('attendance-students-update-post') }}">
            @csrf
            <div class="row">
                @foreach ($students as $student)
                    <div class="col-12">
                        <div class="alert">
                            <h6 class="float-left">{{ $student->student_code }}| </h6>
                            <h3 class="float-left">{{ $student->full_name }}</h3>
                            <img class="float-left" style="width:10%" src="{{ $student->avatar_img_path }}" alt="{{ $student->student_code }}">
                            {{-- INPUT ATTENDANCE --}}
                            <input type="checkbox" class="float-right" name="attendance[]" value="{{ $student->id }}" {{ $student->checked == 'true'?'checked':'' }}>
                        </div>
                    </div>
                @endforeach
            </div>
            <input type="hidden" name="days_class_subject_id" value="{{ $classSubject->dcs_id }}">
            <input type="hidden" name="class_id" value="{{ $classSubject->class_id }}">
            <input type="hidden" name="study_time_id" value="{{ $classSubject->study_time_id }}">
            <button type="=submit" class="btn btn-success float-right" {{ $timeOut=='false'?'':'disabled' }}>Cập nhật</button>
        </form>
      </div>
      <br><br><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>