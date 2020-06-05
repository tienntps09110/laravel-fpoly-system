@extends('teacher.home')
@section('content-teacher')

<div class="container-fluid p-lg-4">
  <div class="content box p-lg-5 p-3 ">
      <div class="text-center pb-3">
          <h3>Danh sách lớp dạy</h3>
      </div>
      <div class="table-responsive">
          <table class="table">
            <tr>
              <th scope="col">#</th>
              <th scope="col" class="text-center">Lớp</th>
              <th scope="col" class="row-width-200 text-center">Môn</th>
              <th scope="col">Thời gian</th>
              <th scope="col" class="row-width-300 text-center">Ca học</th>
              <th scope="col" class="row-width-200" style="max-width:300px">Thứ học</th>
              <th scope="col" > </th>
            </tr>
          @foreach ($classSubjects as $key => $detailCs)
            <tr>
              <th scope="row"> {{ ++$key }} </th>
              <td class="text-center"> {{ $detailCs->class_name }} </td>
              <td class="row-width-200 text-center">{{ $detailCs->subject_name }}</td>
              <td>{{ $detailCs->study_time_name }}</td>
              <td class="row-width-300 text-center"> {{ $Carbon::parse($detailCs->datetime_start)->format('d/m/Y') .' - ' .$Carbon::parse($detailCs->datetime_end)->format('d/m/Y') }} </td>
              <td class="row-width-200" style="max-width:300px"> @for($i = 0; $i < count(json_decode($detailCs->days_week)); $i++)
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
