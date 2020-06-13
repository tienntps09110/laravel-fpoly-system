@extends("student.home")
@section('content-student')
    <div class="container-fluid  p-4">
      <div class="box p-4">
          <div class="title p-2 mb-5 text-center alert-primary-neo">DANH SÁCH MÔN HỌC</div>
          <div class="px--lg-5 table-responsive">
              <table class=" table-center" id="datatable">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Môn học</th>
                      <th>Giảng viên</th>
                      <th >Ca học</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($classSubjects as $key => $classSub)
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $classSub->subject_name }}</td>
                        <td>{{ $classSub->user_full_name }}</td>
                        <td>{{ $classSub->study_time_name }} ( {{ $classSub->study_time_start .' - ' .$classSub->study_time_end  }} ) </td>
                        <td>
                          <a class="btn btn-link" href="{{ route('get-class-subject-detail-student', $classSub->id) }}">Chi tiết</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection