{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
{{-- CREATE STUDENT EXCEL --}}
<h4 class="alert-success-neo m-4 p-2 text-center">Tạo học sinh</h4> 
<form id="createStudents" enctype="multipart/form-data">
    @csrf
    <div class="form-group col-lg-8 mx-auto">
        <label for="excelStudent">Excel File</label>
        <input id="excelStudent" class="form-control" type="file" name="excelStudent">
    </div>
    {{-- EXCEL FILE<input type="file" name="excel"> --}}
    <div class="form-group col-lg-8 mx-auto text-right">
        <button id="BtcreateStudent" type="button" class="btn btn-primary-neo">Lưu</button>
    </div>
</form>

<script>
    $('#BtcreateStudent').click( () => {
        let  _tokenStudent = '{{ csrf_token() }}';
        let excel        = $("#excelStudent");
        let messSuccess = $("#resultAjaxSuccess");
        let messError   = $("#resultAjaxError");
        let formData = new FormData();
        // console.log(excel[0].value);
        formData.append('excel', excel[0].files[0]);
        // console.log(formData.get('excel'));
        $.ajax({
            type:'POST',
            data: formData,
            url:'{{ route('create-student-excel') }}',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': _tokenStudent,
            },
            success:function(data) {
                if(data.Status == 200){
                    // messSuccess.html(data.Message).removeClass('d-none');
                    // setTimeout( () => { messSuccess.addClass('d-none').html('')  }, 3000);
                    toastMess (data.Message, 5000,'success');
                    $("#createStudents input").val('');
                    console.log(data);
                }else{
                    // messError.removeClass('d-none');
                    if(typeof data.Message == 'object'){
                        $.each(data.Message, function(key, value){
                            // messError.append(this + '<br>');
                            toastMess (this, 6000,'error');
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