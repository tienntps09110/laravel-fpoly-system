
  @extends('collaboration.home')
  @section('content.collaboration')
<!-- hàng 1 - các Nút tổng số lượng  -->
<div class="container-fluid px-lg-5  my-lg-3 ">
    <div class=" ">
        <div class="row" id="render-count-all"></div>
    </div>
</div>
<!-- hàng 2 - Biểu đồ theo tháng & Biểu đồ hình tròn điểm danh theo lớp -->
<div class="container-fluid px-lg-5 my-lg-3 ">
    <div class=" ">
        <div class="row">
            <div  class="col-lg-8 d-flex flex-column justify-content-around ">
 
                    <div id="component-dashboard-month" class=" mb-3 "></div>
                    <div id="dashboard-radius" class="mb-lg-0 mb-3 "></div>
     
            </div>
            <div class="col-lg-4 ">
                <div class="myChart" style="height:100%">
                    <div id="dashboard-news" class="" > 
                        <div class="text-center alert-primary-neo my-3 p-2">Thông tin </div>
                        <div style="">
                            <div class="ml-3">  Thông tin học tập
                                <div class="ml-1 p-2">
                                    <span class="time-alert">01-06-2020:</span>  
                                    <a href="" class=" btn-link">  [CS1]_DANH SÁCH THI LẠI CÁC MÔN ONLINE TUẦN 15.06 - 20.06 (DỰ KIẾN) </a> 
                                </div>
                                <div class="ml-1 p-2">
                                    <span class="time-alert">25-05-2020:</span>
                                    <a href="" class="  btn-link"> 2020_SPRING_KIỂM TRA THÔNG TIN SINH VIÊN  </a> 
                                </div>
                                <div class="ml-1 p-2">
                                    <span class="time-alert">19-05-2020:</span>
                                    <a href="" class="  btn-link"> CS3_SUMMER 2020_THÔNG BÁO LỊCH HỌC TRẢ NỢ MÔN MOB402 &MOB1014 BLOCK 2  </a> 
                                </div>
                                <div class="ml-1 p-2">
                                    <span class="time-alert">06-05-2020:</span>
                                    <a href="" class="  btn-link"> THÔNG TIN TỔNG HỢP TUẦN LỄ ĐỊNH HƯỚNG DỰ ÁN TỐT NGHIỆP FALL 2020  </a> 
                                </div>
                                <div class="ml-1 p-2 text-right">
                                    <a href="" class="  btn-link">  Xem thêm ...  </a> 
                                </div>
                            </div>
                            <div class="ml-3">Thông tin hoạt động
                                <div class="ml-1 p-2">
                                    <span class="time-alert">12-06-2020:</span>
                                    <a href="" class="  btn-link">  THÔNG BÁO DANH SÁCH SINH VIÊN THÔI HỌC CHÍNH THỨC HỌC KỲ SUMMER 2020 </a> 
                                </div>
                                <div class="ml-1 p-2">
                                    <span class="time-alert">08-06-2020:</span>
                                    <a href="" class="  btn-link"> THÔNG BÁO PHÁT SÁCH HỌC KỲ SUMMER 2020_ĐỢT 1</a>
                                </div>
                                <div class="ml-1 p-2">
                                    <span class="time-alert">18-05-2020:</span>
                                    <a href="" class="  btn-link"> THÔNG BÁO ĐĂNG KÝ THAM DỰ LỄ TỐT NGHIỆP 2020</a>
                                </div>
                                <div class="ml-1 p-2 text-right">
                                    <a href="" class="  btn-link"> Xem thêm ... </a> 
                                </div>
                            </div>
                            <div class="ml-3">Thông tin học phí
                                <div class="ml-1 p-2">
                                    <span class="time-alert">07-06-2020:</span>
                                    <a href="" class="  btn-link">  DANH SÁCH SINH VIÊN HOÀN THÀNH HỌC PHÍ HỌC KỲ SUMMER 2020 </a> 
                                </div>
                                <div class="ml-1 p-2"> 
                                    <span class="time-alert">01-06-2020:</span>
                                    <a href="" class="  btn-link"> THÔNG BÁO HỌC PHÍ HỌC KỲ SUMMER 2020 </a> 
                                </div>
                                <div class="ml-1 p-2">
                                    <span class="time-alert">02-06-2020:</span>
                                    <a href="" class="  btn-link"> ĐÓNG TIỀN QUA NGÂN HÀNG KHÔNG RÕ THÔNG TIN </a> 
                                </div>
                                <div class="ml-1 p-2 text-right">
                                    <a href="" class="  btn-link">  Xem thêm ... </a> 
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- hàng 3 - nhận xét GV -->
<div class="container-fluid px-lg-5 my-lg-3">
    <div class=" ">
        <div id="note-teachers" class="px-lg-5 px-3 pt-3 pb-lg-0 pb-5"></div>
    </div>
</div>

 
    <!-- Biểu đồ hình tròn điểm danh theo lớp -->
</div>
<script>
    // COMPONENT REALTIME
    let compoCountAll = $('#render-count-all');
    let compoDashBoardMonth = $('#component-dashboard-month');
    let compoDashBoardRadius = $('#dashboard-radius');
    let compoNoteTeachers = $('#note-teachers');

    let routeCountAll = '{{ route('collaboration-component-count-all') }}';
    let routeDashMonth = '{{ route('collaboration-component-dashboard-month') }}';
    let routeDashRadius = '{{ route('collaboration-component-dashboard-radius') }}';
    let routeNoteTeachers = '{{ route('collaboration-component-note-teachers') }}';

    // AJAX COUNT ALL
    $.ajax({
        type:'GET',
        url: routeCountAll,
        success:function(data) {
            compoCountAll.html(data);
        }
    });

    // AJAX DASHBOARD MONTH
    $.ajax({
        type:'GET',
        url: routeDashMonth,
        success:function(data) {
            compoDashBoardMonth.html(data);
        }
    });

    // AJAX DASHBOARD RADIUS
    $.ajax({
        type:'GET',
        url: routeDashRadius,
        success:function(data) {
            compoDashBoardRadius.html(data);
        }
    });

    // AJAX DASHBOARD RADIUS
    $.ajax({
        type:'GET',
        url: routeNoteTeachers,
        
        success:function(data) {
            compoNoteTeachers.html(data);
        }
    });

    function loadAjax(component, route){
        component.load(route);
    };

    Pusher.logToConsole = true;

    let pusher = new Pusher('32e627482335c9cb167b', {
    cluster: 'ap1'
    });

    let channel = pusher.subscribe('dashboard-home');
    channel.bind('dashboard', function(data) {
        let dataParse = JSON.parse(JSON.stringify(data));
        switch(dataParse.data.route_name){
            case routeCountAll:
                loadAjax(compoCountAll, routeCountAll);
            break;
            case routeDashMonth:
                loadAjax(compoDashBoardMonth, routeDashMonth);
            break;
            case routeNoteTeachers:
                loadAjax(compoNoteTeachers, routeNoteTeachers);
            break;
            case routeDashRadius:
                loadAjax(compoDashBoardRadius, routeDashRadius);
            break;
            default:
                console.log('not found function realtime');
        }
    });
</script>
@endsection
