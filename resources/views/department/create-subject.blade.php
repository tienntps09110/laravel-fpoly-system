
<h2 class="alert alert-success text-center">Tạo môn học</h2>

<form method="post" action="{{ route('create-subject-post') }}">
    @csrf
    <div class="form-group col-lg-8 mx-auto">
        <label for="name">Nhập môn học *</label>
        <input id="name" class="form-control" type="text" name="name" required>
    </div>
    {{-- NAME<input type="text" name="name"> --}}
    <div class="form-group col-lg-8 mx-auto">
        <label for="code">Nhập mã môn *</label>
        <input id="code" class="form-control" type="text" name="code" required>
    </div>
    {{-- CODE<input type="text" name="code"> --}}
    <div class="form-group col-lg-8 mx-auto">
        <button class="btn btn-primary" type="submit">Lưu</button>
    </div>
</form>