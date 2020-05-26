<hr>
<h5>CREATE SUBJECT</h5>
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