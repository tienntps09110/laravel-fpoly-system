<div>FORM CREATE USER</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    {{session('Danger')?session('Danger'):''}}
</div>
{{-- SUCCESS CREATED ACCOUNT --}}
<div>
    {{session('Success')?session('Success'):''}}
</div>
<form method="POST" action="">
    @csrf
    User name<input type="text" name="user_name">
    <br>
    Password<input type="password" name="password">
    <br>
    Role<select name="role">
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <br>
    full_name<input type="text" name="full_name">
    <br>
    phone_number<input type="text" name="phone_number">
    <br>
    email<input type="text" name="email">
    <br>
    avatar_img_path<input type="text" name="avatar_img_path">

    <br>
    <button type="submit">Submit</button>
</form>