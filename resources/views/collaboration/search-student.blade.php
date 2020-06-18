@extends('collaboration.home')
@section('content.collaboration')

<div class="container-fluid mb-4">
    <div class="contain content box p-lg-5 p-3">
        <div class="d-flex justify-content-end">
                <div id="form-search"  class="  col-lg-4 ">
                        <input type="search" name="search-student" id="search" class="form-control" placeholder="ps09110" required>
                        <button type="button" style="border-radius:20px" class="btn btn-primary-neo mt-2">Tìm kiếm</button>
                    </div>
        </div>
        <div class="text-center p-2">
            <div class="title alert-primary-neo p-2">
                <i class="fas fa-address-card"></i> 
                Thông tin sinh viên 
            </div>
        </div>
       <div id="info-student" class=" "></div>
    </div>
</div>
<script>
    var buttonSearch    = $('#form-search button');
    var inputSearch     = $('#form-search #search');
    var viewInfoStudent = $('#info-student');
    buttonSearch.click( ()=> {
        // console.log(inputSearch);
        viewInfoStudent.html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
        $.ajax({
            method: 'POST',
            url: '{{ route('search-student-post') }}',
            data: {
                _token : '{{ csrf_token() }}',
                student_code : inputSearch.val()
            },
            success: function(data){
                if(data.Status == 404){
                    console.log('<h5>'+data.Message+'</h5>');
                    viewInfoStudent.html('');
                    viewInfoStudent.html('<h5 class="text-center text-danger">'+data.Message+'</h5>');
                    // setTimeout(()=>{viewInfoStudent.html('');}, 4000);
                }else{
                    console.log(data);
                    viewInfoStudent.html('');
                    viewInfoStudent.html(data);
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    });
</script>
@endsection