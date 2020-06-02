<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{ asset('') }}">
    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script defer src="js/solid.min.js" ></script>
    <script defer src="js/fontawesome.min.js" ></script>  
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/neo-style.css">
     
    <style>
    .toggle-off.btn {
        background: yellow;
    }
</style>


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
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     
    <script src="js/script.js" ></script>
    
</body>
</html>
