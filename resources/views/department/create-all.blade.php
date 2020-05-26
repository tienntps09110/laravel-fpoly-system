@extends('department.home')
@section('contentPDT')
<hr>
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
<div class="alert alert-danger d-none" id="resultAjaxError"></div>

<div class="alert alert-success d-none" id="resultAjaxSuccess"></div>

    <div class="row">
        <div class="col-lg-6">
            @include('department.create-class')
        </div>
        <div class="col-lg-6">
        @include('department.create-students')
        </div>
        <div class="col-lg-6">
            @include('department.create-subject')
        </div>
        <div class="col-lg-6">
            @include('department.create-teachers')
        </div>
    </div>
@endsection