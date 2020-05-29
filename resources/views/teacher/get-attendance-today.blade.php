@extends('teacher.home')
@section('content-teacher')
      <div class="container">
        <div class="alert alert-warning"><h3 class="text-center">ĐIỂM DANH</h3></div>
        {{-- ERROR --}}
        <div>
            @if($errors->any())
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif
        </div>
        {{-- DANGER --}}
        @if(session('Danger'))
        <div class="alert alert-danger font-weight-bold text-center">
            {{ session('Danger') }}
        </div>
        @endif
        {{-- SUCCESSFULLY --}}
        @if(session('Success'))
        <div class="alert alert-success font-weight-bold text-center">
            {{ session('Success') }}
        </div>
        @endif
        {{-- end-successfully --}}
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã sinh viên</th>
                    <th>Họ và Tên</th>
                    <th class="text-center">Hình</th>
                    <th class="text-center">
                        <button class="btn btn-warning" id="kiem-tra-vang">Vắng</button>
                        <button class="btn btn-dark" id="kiem-tra-tong">Tổng</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <form method="post" action="{{ route('attendance-students-post') }}">
                    @csrf
                    @foreach ($students  as $key=> $student)
                    <tr class="row-center">
                        <td >{{ ++$key }} </td>
                        <td> {{ $student->student_code }} </td>
                        <td> {{ $student->full_name }} </td>
                        <th class="text-center">
                            <img src="{{ $student->avatar_img_path }}" alt="{{ $student->avatar_img_path }}" height="100px" width="70px">
                        </th>
                        <td class="text-center">
                                <input type="checkbox" name="attendance[]" value="{{ $student->id }}" class="float-right">
                            
                            {{-- <div class="slideTwo">  
                                <input type="checkbox" value="None" id="slideTwo" name="check" checked />
                                <label class="labelSlide" for="slideTwo"></label>
                              </div> --}}
                        </td>
                    </tr>
                    @endforeach        
                    <input type="hidden" name="days_class_subject_id" value="{{ $classSubject->dcs_id }}">
                    <input type="hidden" name="class_id" value="{{ $classSubject->class_id }}">
                    <input type="hidden" name="study_time_id" value="{{ $classSubject->study_time_id }}">
                    <tr class="row-center">
                        <td colspan="4" align="right" class="text-secondary font-italic small"> Nhấn nút Lưu để hoàn tất điểm danh</td>
                        <td class="text-center">
                            <button type="submit" class="btn btn-success float-right" id="Luu" {{ $timeOut=='false'?'':'disabled' }}>Lưu lại</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
      </div>
 @endsection