
<!doctype html>
<html lang="en">
  <head>
    <title>TeamProQ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{ asset('') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script defer src="js/solid.min.js" ></script>
    <script defer src="js/fontawesome.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/neo-style.css">
</head>
  <body>
      <div class="wrapper">
          <!-- aside menu -->
           @include('department.sidebar')
          <!-- page content -->
          <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-bg" style="padding:0rem">
                <div class="container-fluid">
                      <div class="col-lg-5"  > 
                          <div class="title-navbar">
                                  Phòng Đào Tạo 
                          </div> 
                          </div>
                      <div class="col-lg-4">
                          <form class="form-inline form-search">
                              <div class="col-12">
                                  <input id="input-search" class="input-search " type="search" placeholder="Tìm kiếm..." aria-label="Search">
                              </div>
                              <label for="input-search" class="icone"> <i class="fas fa-search"></i></label>
                          </form>
                      </div>
                      <div class="d-flex justify-content-center col-lg-3" id="navbar-icon">
                          <a class="nav-link "style="color:#FFFFFF"  ><i class="fas fa-bell"></i></a>
                          <a class="nav-link" style="color:#FFFFFF"  ><i class="fas fa-envelope"></i></a>
                          <a class="nav-link" id="btn-menu" ><i class="fas fa-bars"></i></a>
                      </div>
                    </button>
                </div>
               
              </nav>

           @yield('contentPDT')

          </div>
      </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/script.js" ></script>    
</body>
</html>