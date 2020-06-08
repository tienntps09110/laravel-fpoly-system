@extends('collaboration.home')
@section('content.collaboration')

<div class="container-fluid p-lg-4">
    <div class="col-12 mb-5">
        <div id="form-search" class="float-right">
            <input type="search" name="search-student" id="search" class="form-control" value="ps09110" required>
            <button type="button" class="btn btn-primary float-right mt-2">Tìm kiếm</button>
        </div>
    </div><br><br>
    <div class="content box p-lg-5 p-3">
        <h3 class="text-center">Thông tin sinh viên</h3>
       <div id="info-student" class="mt-3"></div>
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