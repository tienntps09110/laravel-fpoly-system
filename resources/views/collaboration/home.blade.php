
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/neo-style.css">
    <link rel="stylesheet" href="css/loading-tien.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/pusher.min.js"></script>
    <script src="js/Chart.js"></script>
    <style>
      @media screen and (max-width:655px){
        #responsive-td1{
          min-width: 160px;
          max-width: 190px;
        }
        #responsive-td3{
          min-width: 160px;
          max-width: 190px;
        }
        #responsive-td4{
          min-width: 230px;
          max-width: 190px;
        }
        #chartRadian{
          width:100%;
          left: 0;
          min-height: auto;
          position: absolute
        }
        #note-teachers{
         margin-top: 20px
        }
        #myChart{
          margin-left: -20px
        }
        #dashboard-radius{
          height:40vh !important;
        }
      }
      @media screen and (max-width:768px){
        #note-teachers {
          margin-top: 20px
        }
      }
      .myChart{
        border-radius: 20px;
      /* padding: 20px; */
      box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
      font-size: 1.5em;
      background-color: white;
      padding: 1em
      }
      #dashboard-radius{
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
        font-size: 1.5em;
        background-color: white;
        border-radius: 20px;
        width:100%;
        min-height:auto
        }
        #note-teachers{
          box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
          font-size: 1.5em;
          background-color: white;
          border-radius: 20px;
          margin-bottom: 15px
        }
        #myChartRadian{
          margin-bottom: 10px
        }

    </style>

</head>
  <body>
      <div class="wrapper">
          <!-- sidebar -->
          @include('collaboration.sidebar')
          <!-- page content -->
          <div id="content">
              {{--  navbar  --}}
            @include('collaboration.navbar')
<!-- hàng 1 - các Nút tổng số lượng  -->
        @yield('content.collaboration')
          </div>
      </div>
    <!-- Optional JavaScript -->
    <script src="js/bootstrap.js"></script>
    <script src="js/scriptchart.js"></script>
    <script defer src="js/solid.min.js" ></script>
    <script defer src="js/fontawesome.min.js" ></script>
    
</body>
</html>