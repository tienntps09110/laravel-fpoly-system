<button id="open-modal-update-class" type="button" style="display:none;" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin lớp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
                </button>
            </div>
            <div class="modal-body" id="form-update-class">
                <input type="hidden" name="id" value="{{ $classMs->id }}">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Mã lớp học:</label>
                    <input class="form-control" name="code" type="text" value="{{ $classMs->code }}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Tên lớp học:</label>
                    <input class="form-control" name="name" type="text" value="{{ $classMs->name }}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Thời gian bắt đầu:</label>
                    <input class="form-control" name="time_start" type="date" value="{{ $Carbon::parse($classMs->time_start)->toDateString() }}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Thời gian kết thúc:</label>
                    <input class="form-control" name="time_end" type="date" value="{{ $Carbon::parse($classMs->time_end)->toDateString() }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="update-class" type="button" data-dismiss="modal" class="btn btn-primary btn-primary-neo">Cập nhật</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(()=>{
        $('#open-modal-update-class').click();
        // console.log(idClass)
        $('#update-class').click(()=>{
            var formClass       = $('#form-update-class');
            var idClass         = formClass.find('input[name="id"]').val();
            var nameClass       = formClass.find('input[name="name"]').val();
            var codeClass       = formClass.find('input[name="code"]').val();
            var timeStartClass  = formClass.find('input[name="time_start"]').val();
            var timeEndClass    = formClass.find('input[name="time_end"]').val();
            $.ajax({
                method: 'POST',
                url: '{{ route('update-class-put') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT',
                    id: idClass,
                    name: nameClass,
                    code: codeClass,
                    time_start: timeStartClass,
                    time_end: timeEndClass
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
                        // $("#load-days-cs").html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
                        // loadAjax($("#load-days-cs"), window.location + '?get_json=ddsaahJIDSA3213hIHAO0e12jkUADI9231jdiI11');
                        toastMess (data.Message, 5000, status);
                    }
                    
                    console.log(data)
                },
                error(data){
                    console.log(data)
                }
            });
        })
    })
</script>