
<h2 class="alert alert-success text-center">Tạo môn học</h2>

<form id="createSubject">
    @csrf
    <div class="form-group col-lg-8 mx-auto">
        <label for="name">Nhập môn học *</label>
        <input id="name" class="form-control" type="text" name="name">
    </div>
    {{-- NAME<input type="text" name="name"> --}}
    <div class="form-group col-lg-8 mx-auto">
        <label for="code">Nhập mã môn *</label>
        <input id="code" class="form-control" type="text" name="code">
    </div>
    <div class="form-group col-lg-8 mx-auto">
        <label for="code">Nhập số ngày vắng tối đa *</label>
        {{-- <input id="day_fail" class="form-control" type="number" name="day_fail" required> --}}
        <select name="day_fail">
            @for($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    {{-- CODE<input type="text" name="code"> --}}
    <div class="form-group col-lg-8 mx-auto">
        <button id="BtcreateSubject" class="btn btn-primary"  type="button" >Lưu</button>
    </div>
</form>

<script>
    $('#BtcreateSubject').click( () => {
        let _token      = '{{ csrf_token() }}';
        let name        = $("#createSubject input[name='name']").val();
        let code        = $("#createSubject input[name='code']").val();
        let day_fail    = $("#createSubject select[name='day_fail']").val();
        let messSuccess = $("#resultAjaxSuccess");
        let messError   = $("#resultAjaxError");

        $.ajax({
            type:'POST',
            url:'{{ route('create-subject-post') }}',
            data:{
                _token:_token,
                name:name,
                code:code,
                day_fail:day_fail
            },
            success:function(data) {
                if(data.Status == 200){
                    messSuccess.html(data.Message).removeClass('d-none');
                    setTimeout( () => { messSuccess.addClass('d-none').html('')  }, 3000);
                    console.log(data);
                }else{
                    messError.removeClass('d-none');
                    if(typeof data.Message == 'object'){
                        $.each(data.Message, function(key, value){
                            messError.append(this + '<br>');
                        });
                    }else{
                        messError.html(data.Message);
                    }
                    setTimeout( () => { messError.addClass('d-none').html('')  }, 3000);
                    console.log(data);
                }
            },
            error: function(data) {
                messError.html(data).removeClass('d-none');
                setTimeout( () => { messError.addClass('d-none').html('')  }, 3000);
                console.log(data.Message);
            }
        });
    });
</script>