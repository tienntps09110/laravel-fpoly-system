<form method="post" action="{{ route('update-class-put') }}">
@method('put')
@csrf

<!-- Button trigger modal -->
<button id="modal-neo" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
  Launch
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Thay đổi thông tin Lớp</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button class="btn btn-primary-neo" type="submit">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
</form>
<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
    });
    $(document).ready(function(){
        $('#modal-neo').click();
    });
</script>

 


 
   

 