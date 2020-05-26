<hr>
<<<<<<< HEAD
CREATE SUBJECT
<br>
CREATE CLASS
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
=======
<h5>CREATE SUBJECT</h5>
>>>>>>> master
<br>
<form method="post" action="{{ route('create-subject-post') }}">
    @csrf
    NAME<input type="text" name="name">
    <br>
    CODE<input type="text" name="code">
    <button type="submit">Create</button>
    <br>
</form>
{{-- <script>
    var sa = {!! json_encode($data) !!};
    console.log(sa);
</script> --}}