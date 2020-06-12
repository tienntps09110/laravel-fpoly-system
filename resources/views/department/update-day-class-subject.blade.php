<button id="open-modal" type="button" style="display:none;" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đổi giáo viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Giáo viên mới:</label>
                    <select id="select-manager" name="user_manager_uuid" class="form-control">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->uuid }}" {{ $teacher->uuid == $dayClassSubject->user_manager_uuid?'selected':'' }}>{{ $teacher->full_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="change-teacher" type="button" data-dismiss="modal" class="btn btn-primary btn-primary-neo">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var resultAjaxSuccess = $('#resultAjaxSuccess');
        $('#open-modal').click();
        $('#change-teacher').click(()=>{
            var selectManager = $('#select-manager option:selected')[0].value;
            $.ajax({
                url: '{{ route('update-day-class-subject-put') }}',
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: '{{ $dayClassSubject->id }}',
                    class_subject_id: '{{ $dayClassSubject->class_subject_id }}',
                    user_manager_uuid: selectManager
                },
                success(data){
                    resultAjaxSuccess.html('');
                    resultAjaxSuccess.text(data.Message).removeClass('d-none');
                    setTimeout(()=> {resultAjaxSuccess.html('').addClass('d-none')}, 4000);
                    $("#load-days-cs").html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
                    loadAjax($("#load-days-cs"), window.location + '?get_json=ddsaahJIDSA3213hIHAO0e12jkUADI9231jdiI11');
                },
                error(data){
                    console.log(data)
                }
            })
        })
    });
    function loadAjax(component, route){
        component.load(route);
    };
</script>
