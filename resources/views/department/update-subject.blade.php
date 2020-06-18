<button id="open-modal-update-subject" type="button" style="display:none;" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin lớp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
                </button>
            </div>
            <div class="modal-body" id="form-update-subject">
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên môn:</label>
                    <input type="hidden" name="id" value="{{ $subject->id }}">
                    <input class="form-control" type="text" id="name" name="name" value="{{ $subject->name }}">
                </div>
                <div class="form-group">
                    <label for="" class="col-form-label">Code:</label>
                    <input class="form-control" type="text" name="code" value="{{ $subject->code }}">
                </div>
                <div class="form-group">
                    <label for="" class="col-form-label">Số ngày nghỉ tối đa:</label>
                    <input class="form-control" type="number" min="1" max="255" name="days_fail" value="{{ $subject->days_fail }}">
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="update-subject" type="button" data-dismiss="modal" class="btn btn-primary btn-primary-neo">Cập nhật</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(()=> {
        $('#open-modal-update-subject').click();
        $('#update-subject').click(()=>{
            var formSubject       = $('#form-update-subject');
            var idSubject         = formSubject.find('input[name="id"]').val();
            var nameSubject       = formSubject.find('input[name="name"]').val();
            var codeSubject       = formSubject.find('input[name="code"]').val();
            var daysFailSubject   = formSubject.find('input[name="days_fail"]').val();
            $.ajax({
                method: 'POST',
                url: '{{ route('update-subject-put') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT',
                    id: idSubject,
                    name: nameSubject,
                    code: codeSubject,
                    days_fail: daysFailSubject
                },
                success(data){
                    status = 'success';
                    if(data.Status != 200){
                        status = 'error';
                        if(typeof data.Message == 'object'){
                            $.each(data.Message, function(key, value){
                                // messError.append(this + '<br>');
                                toastMess (this, 5000,'error');
                            });
                        }else{
                            toastMess (data.Message, 5000, status);
                        }
                    }else{
                         $("#load-subjects").html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
                        loadAjax($("#load-subjects"), window.location + '?get_json=fdsf36443wtrgfsc735yerf');
                        toastMess (data.Message, 5000, status);
                    }
                    console.log(data)
                },
                error(data){
                    console.log(data)
                }
            });
        });
    })
</script>
Z
