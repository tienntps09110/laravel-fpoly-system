@extends('teacher.home')
@section('content-teacher')

{{-- {{ json_encode($cLassSubject) }} --}}


<div class="row">
    <div class="col-lg-11 mx-auto card-alert">
        <h1 class="alert alert-success text-center">THÔNG TIN MÔN HỌC CỦA LỚP</h1>
        <div class="box box-border">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Tên Lớp</th>
                    <th scope="col">Môn Học</th>
                    {{-- <th scope="col">Ca </th> --}}
                    <th scope="col">Ngày Bắt Đầu</th>
                    <th scope="col">Ngày kết thúc</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"> {{ $cLassSubject->id }} </th>
                        <td>  {{ $cLassSubject->subject_name }} </td>
                        {{-- <td> {{ $Carbon::parse($cLassSubject->datetime_start)->toDateString() .' - ' .$Carbon::parse($cLassSubject->datetime_end)->toDateString() }}  </td> --}}
                        <td> {{ $Carbon::parse($cLassSubject->datetime_start)->format('d/m/Y') }} </td>
                        <td> {{ $Carbon::parse($cLassSubject->datetime_end)->format('d/m/Y') }} </td>
                      </tr>
                </tbody>
              </table>
        </div>
    </div>
    <div class="col-lg-11 mt-5 mx-auto card-alert">
        <h1 class="alert alert-success text-center">THÔNG TIN NGÀY HỌC</h1>
        <div class="box box-border">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Giáo Viên</th>
                    <th scope="col">Ngày Dạy</th>
                    <th scope="col">Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($daysClassSubject as $key=> $daysDetail)
                        <tr>
                            <th scope="row"> {{ ++$key }} </th>
                            <td> {{$daysDetail->user_full_name }} </td>
                            <td> {{ $Carbon::parse($daysDetail->date)->format('d/m/Y') }} </td>
                            <td class="{{ $daysDetail->checked =="false" ? "badge badge-danger" :"badge badge-success"  }}" > {{ $daysDetail->checked =="false" ? "Chưa Dạy" :"Đã dạy" }} </td>
                          </tr>
                        @endforeach    
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
