<!doctype html>
<html lang="en">
  <head>
    <title>ROUTE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="alert alert-success" role="alert">
            <h4 class="alert-heading text-center">ROUTE</h4>
            <p class="text-center">name (method): link</p>
            <p class="mb-0"></p>
          </div>
      <div class="container col-6">
          {{-- AUTH --}}
          <div class="alert alert-primary text-center font-weight-bold">AUTH</div>
          @foreach($auth as $au)
          {{ $au['name'] }} ({{ $au['method'] }}): <a href="{{ route($au['route']) }}">CLICK</a>
          <br>
          @endforeach
          <br>
          {{-- USERS --}}
          <div class="alert alert-danger text-center font-weight-bold">USERS</div>
          @foreach($users as $ad)
            @if($ad['route'] == 'get-user')
                {{ $ad['name'] }} ({{ $ad['method'] }}): <a href="{{ route($ad['route'], '053dca80-9178-4551-b0f1-2f30a66cad92') }}">CLICK</a>
            @else
                {{ $ad['name'] }} ({{ $ad['method'] }}): <a href="{{ route($ad['route']) }}">CLICK</a>
            @endif
            <br>
          @endforeach
          <br>
          {{-- CLASS --}}
          <div class="alert alert-dark text-center font-weight-bold">CLASS</div>
          @foreach($classM as $class)
            @if($class['route'] == 'get-class-detail' || $class['route'] == 'update-class-view')
                {{ $class['name'] }} ({{ $class['method'] }}): <a href="{{ route($class['route'], '1') }}">CLICK</a>
            @else
                {{ $class['name'] }} ({{ $class['method'] }}): <a href="{{ route($class['route']) }}">CLICK</a>
            @endif
            <br>
          @endforeach
          <br>
          {{-- STUDENT --}}
          <div class="alert alert-dark text-center font-weight-bold">STUDENT</div>
          @foreach($students as $student)
            @if($student['route'] == 'get-student' || $student['route'] == 'update-student')
                {{ $student['name'] }} ({{ $student['method'] }}): <a href="{{ route($student['route'], '76') }}">CLICK</a>
            @else
                {{ $student['name'] }} ({{ $student['method'] }}): <a href="{{ route($student['route']) }}">CLICK</a>
            @endif
            <br>
          @endforeach
          <br>
          {{-- SUBJECT --}}
          <div class="alert alert-dark text-center font-weight-bold">SUBJECT</div>
          @foreach($subjects as $subject)
            @if($subject['route'] == 'get-subject' || $subject['route'] == 'update-subject-view')
                {{ $subject['name'] }} ({{ $subject['method'] }}): <a href="{{ route($subject['route'], '1') }}">CLICK</a>
            @else
                {{ $subject['name'] }} ({{ $subject['method'] }}): <a href="{{ route($subject['route']) }}">CLICK</a>
            @endif
            <br>
          @endforeach
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>