<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{ asset('') }}">
    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script defer src="js/solid.min.js" ></script>
    <script defer src="js/fontawesome.min.js" ></script>  
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/neo-style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Vietnamese.json"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="js/script.js" ></script>
    
</body>
</html>
