@extends('teacher.home')
@section('content-teacher')
<div class="row">
        <div class="col-lg-11 mx-auto card-alert">
            <h2 class="text-center alert alert-success">Danh sách môn học giảng viên</h2>
            <div class="box border">
              <div class="table-responsive">
                <table class="table">
<<<<<<< HEAD
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Môn</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Ca học</th>
                        <th scope="col">Thứ học</th>
                        <th scope="col" >Chi tiết</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($classSubjects as $key=> $detailCs)
                      <tr>
                        <th scope="row"> {{ ++$key }} </th>
                        <td> {{ $detailCs->class_name }} </td>
                        <td>{{ $detailCs->subject_name }}</td>
                        <td>{{ $detailCs->study_time_name }}</td>
                        <td> {{ $Carbon::parse($detailCs->datetime_start)->format('d/m/Y') .' - ' .$Carbon::parse($detailCs->datetime_end)->format('d/m/Y') }} </td>
                        <td> @for($i = 0; $i < count(json_decode($detailCs->days_week)); $i++)
                                {{ $Core::dayString(json_decode($detailCs->days_week)[$i]) .', ' }}
                            @endfor   
                        </td>
                        <td>
                            <a class="badge badge-success" href="{{ route('get-class-subject-teacher', $detailCs->id) }}">Thông tin</a>        
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
=======
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Lớp</th>
                      <th scope="col">Môn</th>
                      <th scope="col">Thời gian</th>
                      <th scope="col">Ca học</th>
                      <th scope="col">Thứ học</th>
                      <th scope="col" >Chi tiết</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($classSubjects as $key=> $detailCs)
                    <tr>
                      <th scope="row"> {{ ++$key }} </th>
                      <td> {{ $detailCs->class_name }} </td>
                      <td>{{ $detailCs->subject_name }}</td>
                      <td>{{ $detailCs->study_time_name }}</td>
                      <td> {{ $Carbon::parse($detailCs->datetime_start)->format('d/m/Y') .' - ' .$Carbon::parse($detailCs->datetime_end)->format('d/m/Y') }} </td>
                      <td> @for($i = 0; $i < count(json_decode($detailCs->days_week)); $i++)
                              {{ $Core::dayString(json_decode($detailCs->days_week)[$i]) .', ' }}
                          @endfor   
                      </td>
                      <td>
                          <a class="badge badge-success" href="{{ route('get-class-subject-teacher', $detailCs->id) }}">Thông tin</a>        
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
>>>>>>> 21529b59040c8020d4c83970ac7fccde1d1a2ccc
            </div>
            
</div> 
@endsection
