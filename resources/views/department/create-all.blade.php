@extends('department.home')
@section('contentPDT')
    <div>
        @if($errors->any())
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
    </div>
    <div>
        {{session('Danger')?session('Danger'):''}}
    </div>
    <div>
        {{session('Success')?session('Success'):''}}
        
    </div>
    <div class="alert alert-danger-neo text-center d-none" id="resultAjaxError"></div>

    <div class="alert alert-success-neo text-center d-none" id="resultAjaxSuccess"></div>
    <div class="container-fluid">
        <div class="p-3 row">
            <div class="col-lg-6 p-lg-3 py-2 ">
                <div class="box  py-2 daotao-create ">
                    @include('department.create-class')
                </div>
            </div>
            <div class="col-lg-6 p-lg-3 py-2 ">
                <div class="box  py-2 daotao-create">
                @include('department.create-subject')
                </div>
            </div>
            <div class="col-lg-6 p-lg-3 py-2 ">
                <div class="box  py-2 daotao-create">
                    @include('department.create-students')
                </div>
            </div>
            <div class="col-lg-6 p-lg-3 py-2 ">
                <div class="box py-2  daotao-create">
                    @include('department.create-teachers')
                </div>
            </div>
        </div>
    </div>
@endsection