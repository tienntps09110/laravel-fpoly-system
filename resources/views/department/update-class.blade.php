UPDATE CLASS
<form method="post">
    @method('put')
    @csrf
    CODE <input type="text" value="{{ $classMs->code }}">
    <br>
    NAME <input type="text" value="{{ $classMs->name }}">
    <br>
    TIME START <input type="text" value="{{ $classMs->time_start }}">
    <br>
    TIME END <input type="text" value="{{ $classMs->time_end }}">
    <br>
    <button type="submit">UPDATE</button>
</form>
<img src="https://robohash.org/pss432fas?set=set4 " alt="">