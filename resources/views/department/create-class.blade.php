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