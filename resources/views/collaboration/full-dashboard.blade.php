
  @extends('collaboration.home')
  @section('content.collaboration')
<!-- hàng 1 - các Nút tổng số lượng  -->
<div class="container-fluid ">
    <div class="container">
        <div class="row" id="render-count-all"></div>
    </div>
</div>
<!-- hàng 2 - Biểu đồ theo tháng -->
<div class="container-fluid ">
    <div class="container">
        <div id="component-dashboard-month" class="  py-3"></div>
    </div>
</div>
<!-- hàng 3 - nhận xét GV -->
<div class="container-fluid ">
    <div class="container">
        <div id="note-teachers" class="  py-3"></div>
    </div>
</div>

<!-- hàng 4 - Biểu đồ hình tròn điểm danh theo lớp -->
<div class="container-fluid ">
    <div class="container">
        <div id="dashboard-radius" class="col-lg-6  py-3"></div>
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
