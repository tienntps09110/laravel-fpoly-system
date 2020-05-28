{{-- ERROR --}}
{{-- <div>
    @if($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</div> --}}

{{-- SUCCESSFULLY --}}
{{-- <div>
    {{session('Success')?session('Success'):''}}
</div> --}}

{{-- CREATE STUDENT EXCEL --}}
<h2 class="text-center alert alert-success">Tạo học sinh </h2>
<form method="POST" action="{{ route('create-student-excel') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group col-lg-8 mx-auto">
        <label for="excel">Excel File</label>
        <input id="excel" class="form-control" type="file" name="excel">
    </div>
    {{-- EXCEL FILE<input type="file" name="excel"> --}}
    <div class="form-group col-lg-8 mx-auto">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>