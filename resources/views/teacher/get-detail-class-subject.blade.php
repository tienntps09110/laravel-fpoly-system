@extends('teacher.home')
@section('content-teacher')

{{-- {{ json_encode($cLassSubject) }} --}}

<div class="container-fluid  p-4">
  <div class="box p-4">
      <div class="title p-lg-4 ">
        THÔNG TIN MÔN HỌC CỦA LỚP: <span class="font-weight-bold ml-4" id="ten-mon">{{ $cLassSubject->class_name }} </span>
          <a id='backward' href="{{ route('get-class-subjects-teacher') }}"><i class="fas fa-sign-out-alt    "></i></a>
      </div>
      <div class="row pb-3">
          {{-- {{ json_encode($cLassSubject) }} --}}
          <div class="col-lg-3 col-6 p-lg-3 p-1 text-center ">Ngày bắt đầu:</div>
          <div class="col-lg-3 col-6 p-lg-3 p-1  text-center font-weight-bold">{{ $Carbon::parse($cLassSubject->datetime_start)->format('d/m/Y') }} </div>
          <div class="col-lg-3 col-6 p-lg-3 p-1   text-center">Ngày kết thúc:</div>
          <div class="col-lg-3 col-6 p-lg-3 p-1   text-center font-weight-bold"> {{ $Carbon::parse($cLassSubject->datetime_end)->format('d/m/Y') }}  </div>
          <div class="col-lg-3 col-6 p-lg-3 p-1   text-center">Giảng viên phụ trách:</div>
          <div class="col-lg-3 col-6 p-lg-3 p-1  text-center font-weight-bold">{{ $cLassSubject->user_full_name }} </div>
          <div class="col-lg-3 col-6 p-lg-3 p-1   text-center">Môn học:</div>
          <div class="col-lg-3 col-6 p-lg-3 p-1   text-center font-weight-bold"> {{ $cLassSubject->subject_name }}</div> 
  
      </div>
      <div class="p-lg-4    ">
          <div class="table-responsive">
              <table class="stripe " id="datatable" >
                <thead class="">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="row-width-200">Tên Giáo Viên</th>
                    <th scope="col">Ngày Dạy</th>
                    <th scope="col">Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($daysClassSubject as $key=> $daysDetail)
                        <tr>
                            <td scope="row"> {{ ++$key }} </td>
                            <td class="row-width-200"> {{$daysDetail->user_full_name }} </td>
                            <td> {{ $Carbon::parse($daysDetail->date)->format('d/m/Y') }} </td>
                            <td class="{{ $daysDetail->checked =="false" ? "text-danger" :"text-success"  }}" > {{ $daysDetail->checked =="false" ? "Chưa Dạy" :"Đã dạy" }} </td>
                          </tr>
                        @endforeach    
                  
                </tbody>
              </table>
            </div>
      </div>
  </div>
</div>
 
@endsection
