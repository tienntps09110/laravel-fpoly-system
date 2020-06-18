@extends('department.home')
@section('contentPDT')
 

<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-2 mb-3  text-center alert-primary-neo">
            Danh sách Sinh viên Toàn trường
        </div>
        <div class="p-lg-4">
            <div id="load-students"></div>
            <div id="view-modal-update"></div>
        </div>
    </div>
  </div>

<script>
  $(document).ready(function(){
    $('#load-students').html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
        .attr('style', 'position: fixed; top: 50%; z-index: 2; left: 50%;');
    $.ajax({
      type: 'GET',
      url: '{{ route('com-students') }}',
      success(data){
        $('#load-students').html('').attr('style', '')
        $('#load-students').html(data)
      }
    })
  })
</script>

@endsection