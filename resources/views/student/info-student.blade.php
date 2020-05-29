@extends('student.home')
@section('content-student')
<div class="box p-4 box-border col-lg-11 mx-auto">
    <div class="row">
        <div class="col-lg-3 p-4">
            <div class="text-center">
                <img src="{{ $Core::user()->avatar_img_path }}" alt="{{ $Core::user()->student_code }}">
                <button class="btn btn-link mt-3 btn-block" id="btn-change-avatar">+ Thay đổi hình đại diện</button>
            </div>
        </div>
        <div class="col-lg-9 p-4">
            <div class="text-center">
                <h3>Thông tin chung</h3>
                <div class="row mt-5">
                    <div class="col-lg-6 p-3">
                        <div class="row">
                            <div class="col-6">Họ và Tên: </div>
                            <div class="col-6 font-weight-bold"> {{ $Core::user()->full_name }} </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-3">
                        <button class="btn btn-outline-info">Thay đổi thông tin</button>
                    </div>
                    <div class="col-lg-6 p-3">
                        <div class="row">
                            <div class="col-6">Lớp: </div>
                            <div class="col-6 font-weight-bold">{{ $classM->name }} </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-3">
                        <div class="row">
                            <div class="col-6">Mssv: </div>
                            <div class="col-6 font-weight-bold">{{ $Core::user()->student_code }}</div>
                        </div>
                    </div>
                     
                    <div class="col-lg-6 p-3">
                        <div class="row">
                            <div class="col-6">Ngày Bắt đầu: </div>
                            <div class="col-6 font-weight-bold"> {{ $classM->time_start }} </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-3">
                        <div class="row">
                            <div class="col-6">Ngày kết thúc: </div>
                            <div class="col-6 font-weight-bold"> {{ $classM->time_end }} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<form action="{{ route('student-logout') }}" method="POST">
    @csrf
    <button type="submit">LOGOUT ({{ $Core::user()->full_name }})</button>
</form>
<br>
{{-- <div class="row">
    <div class="col-3">
        <img src="{{ $Core::user()->avatar_img_path }}" alt="{{ $Core::user()->student_code }}">
    </div>
    <div class="col-9">
        <h3>Lớp: {{ $classM->name }} ({{ $classM->time_start }} - {{ $classM->time_end }}) </h3>
        <h3>MSSV: {{ $Core::user()->student_code }} </h3>
        <h3>Họ và tên: {{ $Core::user()->full_name }} </h3>
        <h3>{{ $Core::user()}}</h3>
    </div>
</div> --}}

<br>
<a href="{{ route('get-class-subjects-student') }}" style="font-size: 20pt">>>Danh sách môn học</a>
<br>
<a href=" {{ route('get-class-subjects-days-student') }} " style="font-size: 20pt">>>Lịch học</a>

@endsection
