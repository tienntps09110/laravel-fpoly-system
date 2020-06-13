@extends('student.home')
@section('content-student')

<div class="px-lg-5">
        <div class="container-fluid py-3">
            <form method="POST" action="{{ route('update-user-put') }}">
                @method('put')
                @csrf
                <div class="box cong-cu-phan-lop p-4">
                    <h3 class="alert-primary-neo mx-lg-4 p-3 text-center">THÔNG TIN CHUNG</h3> 
    
                    <div class="py-lg-  pl-lg-5">
                        <div class="row">
                            <div class="col-lg-4 text-center">
                                <div id="avatar" style="background-image:url({{ $CoreS::user()->avatar_img_path }})"></div>
                                {{-- <a href="{{ route('get-users')}}" class="btn btn-link" style="font-size:3rem"> <i class="fas fa-chevron-circle-left    "></i> </a> --}}
                                {{-- <img src="{{ $student->avatar_img_path }}" alt="{{ $student->avatar_img_path }}" style="width:100%"> --}}
                            </div>
                            <div class="col-lg-8 ">
                                <div class="row">
                                    <div class="col-lg-6 px-lg-2 py-2">
                                          MSSV: 
                                          <span class="row-thong-tin-chung">{{ $CoreS::user()->student_code }} </span>  
                                    </div>
                                    <div class="col-lg-6 px-lg-2 py-2">
                                          Họ và Tên: 
                                          <span class="row-thong-tin-chung"> {{ $CoreS::user()->full_name }} </span>
                                          
                                    </div>
                                    <div class="col-lg-6 px-lg-2 py-2">
                                         Giới tính: 
                                         <span class="row-thong-tin-chung"> {{ $CoreS::user()->sex }} </span>
                                    </div>
                                    <div class="col-lg-6 px-lg-2 py-2">
                                         Số điện thoại: 
                                         <span class="row-thong-tin-chung">  {{ $CoreS::user()->phone_number }} </span>
                                    </div>
                                    <div class="col-lg-6 px-lg-2 py-2">
                                         Email: 
                                         <span class="row-thong-tin-chung">  {{ $CoreS::user()->email }} </span>
                                    </div>
                                    <div class="col-lg-6 px-lg-2 py-2">
                                         Địa chỉ 
                                         <span class="row-thong-tin-chung">  {{ $CoreS::user()->address }} </span>
                                    </div>
                                    <div class="col-lg-6 px-lg-2 py-2" style="overflow:hidden">
                                        Ngày Bắt đầu:
                                        <span class="row-thong-tin-chung">  {{  $classM->time_start }} </span>
                                    </div>
                                    <div class="col-lg-6 px-lg-2 py-2">
                                        Ngày Bắt đầu:
                                        <span class="row-thong-tin-chung">  {{  $classM->time_start }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

 
@endsection
