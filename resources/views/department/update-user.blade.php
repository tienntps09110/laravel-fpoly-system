@extends('department.home')
@section('contentPDT')
 
{{-- ERROR --}}
    @if($errors->any())
        <div class="text-center">
            <div class="alert alert-danger-neo">
                <h3> Thông báo </h3>
                <ul style="    display: inline-block;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        </div>
    @endif
{{-- SUCCESSFULLY --}}
    @if(session('Danger'))
        <div class="alert-danger-neo text-center">
        {{session('Danger')}}
        </div>
    @elseif(session('Success'))
        <div id="success" class="alert-success-neo text-center">
        {{session('Success')}}
        </div>
    @endif
{{-- content --}}

<div class="px-lg-5">
    <div class="container-fluid py-3">
        <form method="POST" action="{{ route('update-user-put') }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="box cong-cu-phan-lop p-4">
                <h3 class="alert-primary-neo mx-lg-4 p-3 text-center">CẬP NHẬT THÔNG TIN CÁN BỘ NHÂN VIÊN</h3> 

                <div class="py-lg-  pl-lg-5">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <div id="avatar" style="background-image:url({{ $user->avatar_img_path }})"></div>
                            <a href="{{ route('get-users')}}" class="btn btn-link" style="font-size:3rem"> <i class="fas fa-chevron-circle-left    "></i> </a>
                            {{-- <img src="{{ $student->avatar_img_path }}" alt="{{ $student->avatar_img_path }}" style="width:100%"> --}}
                        </div>
                        <div class="col-lg-8 ">
                            <div class="row">
                                <div class="col-lg-6 px-5 py-2">
                                    <label for=""> Tên đăng nhập:   </label> 
                                    <input type="hidden" value="{{ $user->uuid }}" name="uuid">
                                    <span   class="form-control"  >{{ $user->user_name }}</span>
                                </div>
                                <div class="col-lg-6 px-5 py-2">
                                    <label for="full_name"> Họ và Tên: </label>
                                    <input type="text" id="full_name" name="full_name" value="{{ $user->full_name }}" class="form-control ">
                                </div>
                                <div class="col-lg-6 px-5 py-2">
                                    <label for="sex"> Giới tính: </label>
                                    <select name="sex" id="sex" class="form-control">
                                        <option value="Nam" {{ $user->sex == 'Nam'?'selected':'' }}>Nam</option>
                                        <option value="Nữ" {{ $user->sex == 'Nữ'?'selected':'' }}>Nữ</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 px-5 py-2">
                                    <label for="phone_number">Số điện thoại:</label>
                                    <input type="text" name="phone_number" id="phone_number"  value="{{ $user->phone_number }}" class="form-control">
                                </div>
                                <div class="col-lg-6 px-5 py-2">
                                    <label for="email">Email:</label>
                                    <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control">
                                </div>
                                <div class="col-lg-6 px-5 py-2">
                                    <label for="address"> Địa chỉ</label>
                                    <input type="text" id="address" name="address" value="{{ $user->address }}" class="form-control">
                                </div>
                                <div class="col-lg-6 px-5 py-2" style="overflow:hidden">
                                    <label for=""> Hình đại diện</label>
                                    <input type="file" name="avatar_img_path" value="{{ $user->avatar_img_path }}" class="form-control" >
                                </div>
                                <div class="col-lg-6 px-5 py-2">
                                    <label for=" ">  &nbsp; </label>
                                    <button type="submit" class="btn btn-success-neo btn-block">Cập nhật</button>
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
