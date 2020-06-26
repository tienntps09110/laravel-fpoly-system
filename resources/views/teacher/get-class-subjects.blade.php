@extends('teacher.home')
@section('content-teacher')

<div class="container-fluid p-4">
  <div class="content box p-lg-5 p-3 ">
      <div class="text-center mb-lg-3 p-2 alert-primary-neo title">
          Danh sách lớp dạy
      </div>
      <div class="table-responsive">
          <table class="table ">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Lớp học</th>
              <th scope="col" class="row-width-200">Môn học</th>
              <th scope="col">Thời gian</th>
              <th scope="col" class="row-width-300">Ca học</th>
              <th scope="col" class="row-width-200" style="width: 300px;">Thứ học</th>
              <th scope="col"> </th>
            </tr>
          @foreach ($classSubjects as $key => $detailCs)
            <tr>
              <th scope="row"> {{ ++$key }} </th>
              <td > {{ $detailCs->class_name }} </td>
              <td >{{ $detailCs->subject_name }}</td>
              <td>{{ $detailCs->study_time_name }}</td>
              <td > {{ $Carbon::parse($detailCs->datetime_start)->format('d/m/Y') .' - ' .$Carbon::parse($detailCs->datetime_end)->format('d/m/Y') }} </td>
              <td >
                @for($i = 0; $i < count(json_decode($detailCs->days_week)); $i++)
                  <span class="badge badge-pill badge-primary badge-primary-neo" style="">{{ $Core::dayString(json_decode($detailCs->days_week)[$i])}}</span>  
                @endfor
              </td>
              <td>
                  <a class="btn btn-primary-neo" href="{{ route('get-class-subject-teacher', $detailCs->id) }}">Thông tin</a>        
              </td>
            </tr>
          @endforeach
          </table>
      </div>
  </div>
</div>
 
@endsection
