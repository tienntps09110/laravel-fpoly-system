<!doctype html>
<html lang="en">
  <head>
    <title>Trang giảng viên</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{ asset('') }}">
    <link rel="shortcut icon" href="laravel-icon.svg" type="image/svg">

    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script defer src="js/solid.min.js" ></script>
    <script defer src="js/fontawesome.min.js" ></script>  
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/neo-style.css">
    <link rel="stylesheet" href="css/datatable-neo.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

</head>
  <body>
      <div class="wrapper">
          <!-- sidebar -->
          @include('teacher.sidebar')
         
          <div id="content">
            <!-- navbar -->
              @include('teacher.navbar')
            <!-- content -->
              @yield('content-teacher')
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.js"></script>
    {{-- <script src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Vietnamese.json"></script> --}}
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
    <script src="js/script.js" ></script>
    
</body>
</html>
