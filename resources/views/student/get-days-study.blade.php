@extends('student.home')
@section('content-student')

    <div class="container-fluid  p-4">
      <div class="box p-4">
        <div class="title p-4">Lịch học</div>
        <div class="px-5">
              <table class="table table-center">
                  <tr>
                      <th>#</th>
                      <th>Ngày học</th>
                      <th>Môn học</th>
                      <th >Ca học</th>
                      <th></th>
                  </tr>
                  @foreach ($classSubjectDays as $key => $detail)
                      {{-- <div class="col-12">
                          <h3>Lớp: {{ $detail->class_name }}</h3>
                          <h3> ({{ $detail->day_name }}) Ngày: {{ $detail->date }}</h3>
                          <h3>Môn: {{ $detail->subject_name }}</h3>
                          <h3>Ca học: {{ $detail->study_time_name }} ({{ $detail->study_time_start }} - {{ $detail->study_time_end }})</h3>
                          <h3>Ngày: </h3>
                          {{-- <h3>Ca học: {{ json_encode($detail) }}</h3> 
                      </div> --}}
                      <tr>
                          <td>{{ ++$key }}</td>
                          <td> ({{ $detail->day_name }})  {{ $detail->date }}</td>
                          <td>{{ $detail->subject_name }}</td>
                          <td>{{ $detail->study_time_name }} ({{ $detail->study_time_start }} - {{ $detail->study_time_end }})</td>
                          <td>
                              <button class="btn btn-link" data-toggle="modal" data-target="#exampleModalCenter">>>> Chi tiết</button>
                          </td>
                      </tr>
                  @endforeach
              </table>
              <!-- (Chi tiết môn học (ẩn)) -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Nội dung bài học </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <p> 1. Bài Giới thiệu </p>
                          <p> 2. Bài tập về nhà </p>
                      </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
