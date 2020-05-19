<div>
    {{session('Danger')?session('Danger'):''}}
</div>
<form method="POST">
    @csrf
    <input type="text" name="user_name">
    <br>
    <input type="password" name="password">
    <br>
    <button type="submit">LOGIN</button>
</form>