
<h4 class="alert-success-neo m-4 p-2 text-center">Tạo môn học</h4>

<form id="createSubject">
    @csrf
    <div class="form-group col-lg-8 mx-auto pd-4">
        <label for="name_subject">Nhập môn học *</label>
        <input id="name_subject" class="form-control" type="text" name="name_subject">
    </div>
    {{-- NAME<input type="text" name="name"> --}}
    <div class="form-group col-lg-8 mx-auto">
        <label for="code_subject">Nhập mã môn *</label>
        <input id="code_subject" class="form-control" type="text" name="code_subject">
    </div>
    <div class="form-group col-lg-8 mx-auto">
        <label for="day_fail">Nhập số ngày vắng tối đa *</label>
        {{-- <input id="day_fail" class="form-control" type="number" name="day_fail" required> --}}
        <select id="day_fail"name="day_fail" class="form-control">
            @for($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    {{-- CODE<input type="text" name="code"> --}}
    <div class="form-group col-lg-8 mx-auto text-right">
        <button id="BtcreateSubject" class="btn btn-primary-neo"  type="button" >Lưu</button>
    </div>
</form>

<script>
    $('#BtcreateSubject').click( () => {
        let _token          = '{{ csrf_token() }}';
        let name_subject    = $("#createSubject input[name='name_subject']").val();
        let code_subject    = $("#createSubject input[name='code_subject']").val();
        let day_fail        = $("#createSubject select[name='day_fail']").val();
        let messSuccess     = $("#resultAjaxSuccess");
        let messError       = $("#resultAjaxError");

        $.ajax({
            type:'POST',
            url:'{{ route('create-subject-post') }}',
            data:{
                _token:_token,
                name     :name_subject,
                code   :code_subject,
                day_fail        :day_fail
            },
            success:function(data) {
                if(data.Status == 200){
                    // messSuccess.html(data.Message).removeClass('d-none');
                    // setTimeout( () => { messSuccess.addClass('d-none').html('')  }, 3000);
                    // console.log(data);
                    toastMess (data.Message, 5000,'success');
                    $("#createSubject input").val('');
                }else{
                    // messError.removeClass('d-none');
                    if(typeof data.Message == 'object'){
                        $.each(data.Message, function(key, value){
                            // messError.append(this + '<br>');
                            toastMess (this, 5000,'error');
                        });
                    }else{
                        // messError.html(data.Message);
                        toastMess (data.Message, 5000,'error');
                    }
                    // setTimeout( () => { messError.addClass('d-none').html('')  }, 3000);
                    // console.log(data);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>