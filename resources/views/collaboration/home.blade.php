
<!doctype html>
<html lang="en">
  <head>
    <title>CÔNG TÁC SINH VIÊN</title>
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
    <script src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="css/all.css">
    <script src="js/app.js"></script>--}}
    <style>
        @media and(max-width:500px){
        .card-info li span{
            margin-right:50px
         }
       }
       /* .card-info{
         display: flex;
         flex-flow: column;
         align-items:left        
         } */
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
        #chartRadian, #chartLine{
          width:100%;
          min-height: auto;
          /* left: 0; */
          /* position: absolute */
        }
        #note-teachers{
         margin-top: 20px
        }
        #myChart{
          /* margin-left: -20px */
        }
        #dashboard-radius{
          /* height:40vh !important; */
        }
        .card-text{
           font-size: 1rem !important
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
      font-size: 1em;
      background-color: white;
      padding: 1em
      }
      #dashboard-news a {
         text-transform: lowercase;
      }
      #note-teachers{
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
        /* font-size: 1em; */
        background-color: white;
        border-radius: 20px;
        margin-bottom: 15px;
        padding: 1em
      }
      #search{
        margin-right: 21px;
        margin-top: 10px;
        border-radius: 20px;  
      }
      #form-search{
        display: flex;
      }
      .contain{
        margin-top: 50px
      }
      #myChartRadian{
        margin-bottom: 10px
      }
      .card-text{
        color: #000 !important
      }
      .text-muted{
        color: #ffffff !important
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

            @yield('content.collaboration')
          </div>
      </div>
    <!-- Optional JavaScript -->
    <script src="js/bootstrap.js"></script>
    <script defer src="js/solid.min.js" ></script>
    <script defer src="js/fontawesome.min.js" ></script>
    <script src="js/script.js" ></script>
    
</body>
</html>