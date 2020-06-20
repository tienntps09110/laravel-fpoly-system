@extends(CheckRole::role()->code == 'admin' ? 'admin.home' : 'department.home')
@section(CheckRole::role()->code == 'admin' ? 'contentAdmin' : 'contentPDT')

 

<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-2 mb-3 text-center alert-primary-neo">
            Danh sách Giảng viên Toàn trường
        </div>
         
        <div class="p-lg-4" id="load-com-users">
            
        </div>
        <div id="view-modal-update"></div>
    </div>
  </div>
<script>
    $(document).ready(function(){
        $('#load-com-users').html('')
        $.ajax({
            type: 'GET',
            url: '{{ route('com-users') }}',
            success(data){
                $('#load-com-users').html(data)
            }
        })
    })
</script>
 
    
@endsection