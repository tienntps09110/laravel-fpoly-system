@extends('department.home')
@section('contentPDT')

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