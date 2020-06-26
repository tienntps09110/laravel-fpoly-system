@extends('teacher.home')
@section('content-teacher')
<div class="container-fluid p-lg-5 p-3">
    <div class="nut-up">
        <i class="fas fa-chevron-circle-up    "></i>
    </div>
    <div class="box p-lg-5 p-3 ">
        <div class=" text-center alert-primary-neo title p-2 mb-lg-3">ĐIỂM DANH </div>
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
            <div class="alert alert-danger-neo font-weight-bold text-center">
                {{ session('Danger') }}
            </div>
        @endif
        {{-- SUCCESSFULLY --}}
        @if(session('Success'))
            <div class="alert alert-success-neo font-weight-bold text-center">
                {{ session('Success') }}
            </div>
        @endif
        {{-- end-successfully --}}
        <div class="table-responsive"  >
             <table class="table text-center" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã sinh viên</th>
                    <th class="row-width-200">Họ và tên</th>
                    <th  >Hình ảnh</th>
                    <th  >
                        <button class="" id="kiem-tra-vang">Vắng</button>
                        <button class="btn btn-primary-neo" id="kiem-tra-tong">Tổng</button>
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
                            <th >
                                <img src="{{ $student->avatar_img_path }}" alt="{{ $student->avatar_img_path }}"  width="100px">
                            </th>
                            <td  >
                                <div class="confirm-switch mx-auto">
                                    <input type="checkbox" id="default-switch{{ $student->id }}" value="{{ $student->id }}" name="attendance[]">
                                    <label for="default-switch{{ $student->id }}"></label>
                                </div>
                            </td>
                        </tr>
                    @endforeach        
                    <input type="hidden" name="days_class_subject_id" value="{{ $classSubject->dcs_id }}">
                    <input type="hidden" name="class_id" value="{{ $classSubject->class_id }}">
                    <input type="hidden" name="study_time_id" value="{{ $classSubject->study_time_id }}">
                    <tr class=" ">
                        <td colspan="4"  class="text-secondary font-italic small">  
                            <textarea type="text" class="form-control" name="note" placeholder="Ghi chú..."></textarea>
                        </td>
                        <td  >
                            <button type="submit" class=" " id="luu" {{ $timeOut=='false'?'':'disabled' }}>Lưu lại</button>
                            <div id="loading"></div>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
        </div>
    </div>
    
</div>
<script>
    $(document).ready(()=>{
        $('#luu').click(()=>{
            $('#luu').hide();
            $('#loading').html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
        })
    })
</script>
 @endsection