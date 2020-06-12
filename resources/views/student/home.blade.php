<!doctype html>
<html lang="en">
  <head>
    <title>Trang Sinh viên</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <base href="{{ asset('') }}">
    <link rel="shortcut icon" href="laravel-icon.svg" type="image/svg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script defer src="js/solid.min.js" ></script>
    <script defer src="js/fontawesome.min.js" ></script>
    
    
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/neo-style.css">
    
    {{-- <script src="js/jquery-3.5.1.js"></script> --}}
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/datatable-neo.css">


</head>
  <body>
      <div class="wrapper">
          <!-- sidebar -->
          @include('student.sidebar')
         
          <div id="content">
            <!-- navbar -->
              @include('student.navbar')
            <!-- content -->
              @yield('content-student')
          </div>
          
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js" ></script>
    
</body>
</html>


               
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   