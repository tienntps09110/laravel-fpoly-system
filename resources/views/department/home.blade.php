
<!doctype html>
<html lang="en">
  <head>
    <title>Phòng Đào Tạo </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{ asset('') }}">
    <link rel="shortcut icon" href="laravel-icon.svg" type="image/svg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script defer src="js/solid.min.js" ></script>
    <script defer src="js/fontawesome.min.js" ></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/neo-style.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/datatable-neo.css">
    

    <style>
    /* sửa style.css */
    .navbar {
        margin-bottom:0;
    }
    .cong-cu-phan-lop{
        padding: 0;
    }
    /* tạo mới css  */
    /* nut tạo lớp, giảng viên,  */
    .daotao-create{
        height:100%;
    }
    /* sidebar */
    #sidebar ul.components li{
        position: relative;
    }
    #sidebar ul>li:hover>a {
        color: #6c859e;
        background: #fff;
    }
    #sidebar ul.components li:hover>ul{
        display: inline;
    }
    #sidebar ul.components li ul{
        display: none;
        position: absolute;
        bottom: 0;
        left: 100%;
        width: 100%;
        list-style: none;
        padding: 0;
    }

    /* phan cong giang day */
    .teacher{
	    color: white ;
        background-color: #6d7fcc;
        border: 1px solid #6d7fcc;
        padding: .3rem;
        border-radius: .3em;
    }
    #result-weekday{
        padding-top: 0.8rem;
    }
    #success, #danger{
        padding: 1rem;
        font-size: 1.3em;
    }
    /* danh sách */
    /* danh sách lớp */
    /* danh sách sinh viên */
    #avatar{
        height: calc(400px*0.8);
        max-height: 100%;
        width: calc(300px*0.8);
        max-width: 100%;
        margin: 0 auto;
        background-position: center center;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    
    </style>
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
    
    <script src="js/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js" ></script>    
</body>
</html>