<<<<<<< HEAD
 
    CREATE CLASS
    <hr>
    <div>
        @if($errors->any())
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
    </div>
    <div>
        {{session('Danger')?session('Danger'):''}}
    </div>
    <div>
        {{session('Success')?session('Success'):''}}
    </div>
    <form method="POST">
        @csrf
        
    NAME<input type="text" name="name">
    <br>
    CODE<input type="text" name="code">
    <br> 
    Datetime start<input type="date" name="time_start">
    <br> 
    Datetime end<input type="date" name="time_end">
        <button type="submit" >Submit</button>
    </form>
  
=======
CREATE CLASS
<form id="createClass" method="POST" action="{{ route('create-class-post') }}">
    @csrf
   NAME<input type="text" name="name">
   <br>
   CODE<input type="text" name="code">
   <br> 
   Datetime start<input type="date" name="time_start">
   <br> 
   Datetime end<input type="date" name="time_end">
    <button id="BtcreateClass" type="button" >Submit</button>
</form>

<script>
    $('#BtcreateClass').click( () => {
        let _token      = $("#createClass input[name='_token']").val();
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
>>>>>>> master
