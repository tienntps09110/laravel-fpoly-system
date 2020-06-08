GET SUBJECTS 
@extends('department.home');
@section('contentPDT')

@foreach ($subjects as $subject)
    {{ $subject }}
@endforeach

@endsection