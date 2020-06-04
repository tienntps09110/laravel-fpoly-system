
  @extends('collaboration.home')
  @section('content.collaboration')
  <div class="container-fluid">
  <div class="container">
      <div class="row">
          <div class="col-sm-4 p-3 card-alert">
              <div class="box border d-flex flex-wrap align-content-center justify-content-center">
                  <div class="text-center">
                      Giáo viên <i class="fas fa-chalkboard-teacher    "></i>
                      </br>
                      <p id="chu-noi">5000</p>
                  </div>
              </div>
          </div>
          <div class="col-sm-4 p-3">
              <div class="box border d-flex flex-wrap align-content-center justify-content-center">
                  <div class="text-center">
                      Giáo viên <i class="fas fa-chalkboard-teacher    "></i>
                      </br>
                      <p id="chu-noi">5000</p>
                  </div>
              </div>
          </div>
          <div class="col-sm-4 p-3">
              <div class="box border d-flex flex-wrap align-content-center justify-content-center">
                  <div class="text-center">
                      Giáo viên <i class="fas fa-chalkboard-teacher    "></i>
                      </br>
                      <p id="chu-noi">5000</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- hàng 2 - Biểu đồ theo tháng -->
<div class="container-fluid">
    <div class="container myChart" style="width:100%;height:80vh">
        <h2 class="text-center">Biểu đồ thể hiện theo tháng </h2>
        <canvas style="border: none" id="myChart"></canvas>
    </div>
</div>
<!-- hàng 3 - nhận xét GV  & Biểu đồ hình tròn điểm danh theo lớp -->
<div class="container-fluid   p-lg-3">
  <div class="container">
      <div class="row">
          <!-- nhận xét GV -->
          <div class="col-12 p-3">
              <div class="nhan-xet">
                  <h5>Nhận xét giáo viên</h5>
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th  class="th-lg">Giáo viên</th>
                                  <th class="th-lg" >Lớp</th>
                                  <th class="th-lg" >Môn</th>
                                  <th class="th-lg">Nhận xé 1t</th>
                              </tr>

                          </thead>
                          {{--  {{ $noteTeacher }}  --}}
                          <tbody>
                              @foreach ($noteTeacher as $item)
                              <tr>
                                <td id="responsive-td1" scope="row">{{ $item->teacher_full_name }}</td>
                                <td id="responsive-td2"> {{ $item->class_name }}</td>
                                <td id="responsive-td3">{{ $item->subject_name }}</td>
                                <td id="responsive-td4"> {{ $item->note }} </td>
                            </tr>
                              @endforeach

                          </tbody>
                      </table>

                  </div>
              </div>
          </div>
          <!-- Biểu đồ hình tròn điểm danh theo lớp -->
          <div class="col-lg-6 p-3">
              
                  <h5>Biểu đồ sinh viên vắng của môn học</h5>
                  <div id="chartRadian">
                          <canvas id="myChartRadian"></canvas>
                      </div>
             
          </div>
      </div>
  </div>
</div>
    {{--  <div class="container">
        <h1 class="text-center text-sucess">HOME COLLABORTION</h1>
        {{ $countMonth }}

        <hr>
        {{ $countClass }}
        <hr>
        {{ $noteTeacher }}

        <h1>EXPORT EXCEL</h1>
        <ul>
          <li><a href="{{ route('collaboration-excel-teacher') }}">TEACHERS</a></li>
          <li><a href="{{ route('collaboration-excel-student') }}">STUDENTS</a></li>
          
        </ul>
    </div>  --}}
<script>
    let dataRes = {!! json_encode($countMonth) !!};
    let dataRadianRes = {!! json_encode($countClass) !!}
</script>
@endsection
