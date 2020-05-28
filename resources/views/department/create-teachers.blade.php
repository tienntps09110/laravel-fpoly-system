
<h2 class="text-center alert alert-success">Tạo giáo viên </h2>
<form method="POST" action="{{ route('create-teachers-excel') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group col-lg-8 mx-auto">
        <label for="excel">Excel File</label>
        <input id="excel" class="form-control" type="file" name="excel">
    </div>
    {{-- EXCEL FILE<input type="file" name="excel"> --}}
    <div class="form-group col-lg-8 mx-auto">
        <button class="btn btn-primary" type="submit">Lưu</button>
    </div>
</form>