<h4 class="alert-success-neo m-4 p-2 text-center">Tạo lớp học</h4> 
<form id="createClass">
    <div class="form-group col-lg-8 mx-auto pd-4">
      <label for="name">Nhập Tên Lớp *</label>
      <input type="text" name="name" id="name" required class="form-control" placeholder="Vui lòng nhập tên lớp">
    </div>
   {{-- NAME<input type="text" name="name"> --}}
    <div class="form-group col-lg-8 mx-auto">
      <label for="code">Nhập mã lớp</label>
      <input type="text" name="code" id="code" class="form-control" placeholder="Vui lòng nhập mã lóp" required>
    </div>
   {{-- CODE<input type="text" name="code"> --}}
    <div class="form-group col-lg-8 mx-auto">
        <label for="time_start">Ngày Bắt đầu</label>
        <input id="time_start" class="form-control" type="date" name="time_start" required>
    </div>

   {{-- Datetime start<input type="date" name="time_start"> --}}
   <div class="form-group col-lg-8 mx-auto">
       <label for="time_end">Ngày kết thức</label>
       <input id="time_end" class="form-control" type="date" name="time_end">
   </div>
   {{-- Datetime end<input type="date" name="time_end"> --}}
    <div class="form-group col-lg-8 mx-auto text-right">
        <button id="BtcreateClass" class="btn btn-primary-neo "  type="button" >Lưu</button>
    </div>
</form>

<script>
    $('#BtcreateClass').click( () => {
        let _token      = '{{ csrf_token() }}';
        let name        = $("#createClass input[name='name']").val();
        let code        = $("#createClass input[name='code']").val();
        let time_start  = $("#createClass input[name='time_start']").val();
        let time_end    = $("#createClass input[name='time_end']").val();
        let messSuccess = $("#resultAjaxSuccess");
        let messError   = $("#resultAjaxError");
    
        $.ajax({
            type:'POST',
            url:'{{ route('create-class-post') }}',
            data:{
                _token:_token,
                name:name,
                code:code,
                time_start:time_start,
                time_end:time_end
            },
            success:function(data) {
                if(data.Status == 200){
                    toastMess (data.Message);
                    $("#createClass input").val('')
                    // messSuccess.html(data.Message).removeClass('d-none');
                    // setTimeout( () => { messSuccess.addClass('d-none').html('')  }, 3000);
                    // console.log(data);
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
                // messError.html(data).removeClass('d-none');
                // setTimeout( () => { messError.addClass('d-none').html('')  }, 3000);
                // toastMess (data, 5000,'error');
                console.log(data);
                
            }
        });
         
    });
</script>