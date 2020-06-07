@extends('collaboration.home')
@section('content.collaboration')

<div class="container-fluid p-lg-4">
    <div class="content box p-lg-5 p-3">
        <div class="container text-center">
            <h3>Thông tin sinh viên</h3>
            {{-- <span class="">{{ $Carbon::now()->format('d/m/Y') }} </span> --}}
        </div>
        <h4>Tìm kiếm</h4>
        <div class="col-4">
            <form id="form-search">
                <input type="search" name="search-student" id="search" class="form-control">
                <button type="button" class="btn btn-primary float-right mt-2">Tìm kiếm</button>
            </form>
        </div>
       
    </div>
    <div id="info-student" class="content box p-lg-5 p-3 col-12 mt-2"></div>
</div>
<script>
    var buttonSearch = $('#form-search button');
    var inputSearch  = $('#form-search #search');
    buttonSearch.click( ()=> {
        console.log(inputSearch);
    });
</script>
@endsection