
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
                <a href="{{ route('collaboration-excel-teacher') }}" title="Xuất tệp tin excel">
                        <p id="chu-noi">{{ $countAll->teachers }}</p>
                    </a>
                </div>
              </div>
          </div>
          <div class="col-sm-4 p-3">
              <div class="box border d-flex flex-wrap align-content-center justify-content-center">
                <div class="text-center">
                    Sinh viên <i class="fas fa-chalkboard-teacher    "></i>
                    </br>
                    <a href="{{ route('collaboration-excel-student') }}" title="Xuất tệp tin excel">
                        <p id="chu-noi">{{ $countAll->students }}</p>
                    </a>
                </div>
              </div>
          </div>
          <div class="col-sm-4 p-3">
              <div class="box border d-flex flex-wrap align-content-center justify-content-center">
                  <div class="text-center">
                      Lớp học <i class="fas fa-chalkboard-teacher    "></i>
                      </br>
                    <a href="{{ route('collaboration-excel-class') }}">
                      <p id="chu-noi">{{ $countAll->class }}</p>
                    </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- hàng 2 - Biểu đồ theo tháng -->
<div class="container-fluid   p-lg-3">
  <div class="container  ">
      <div class="box-bieu-do">
          <h5>Biểu đồ điểm danh theo tháng</h5>
          <div class=" col-lg bieu-do">
              <div class="card" style="border:none">
                  <div class="card-body">
                      <canvas style="border: none" id="myChart" width="80vw" height="40vh"></canvas>
                  </div>
              </div>
          </div>
      </div>
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
              <div class="diem-danh-lop">
                  <h5>Biểu đồ sinh viên vắng của môn học</h5>
                  <div>
                      <div class="card-body">
                          <canvas id="myChartRadian" width="500" height=""></canvas>
                      </div>
                  </div>
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
