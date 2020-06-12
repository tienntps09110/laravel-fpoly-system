<form method="post">
@method('put')
@csrf
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Mã lớp học:</label>
        <input class="form-control" type="text" value="{{ $classMs->code }}">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Tên lớp học:</label>
        <input class="form-control" type="text" value="{{ $classMs->name }}">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Thời gian bắt đầu:</label>
        <input class="form-control" type="text" value="{{ $classMs->time_start }}">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Thời gian kết thúc:</label>
        <input class="form-control" type="text" value="{{ $classMs->time_end }}">
    </div>
    <div class="form-group">
        <button class="btn btn-primary-neo" type="submit">Update</button>
    </div>

</form>
   

 