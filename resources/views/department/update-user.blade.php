UPDATE USER
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
<br>
<form method="POST" action="{{ route('update-user-put') }}">
    @csrf
    @method('put')
    <input type="hidden" value="{{ $user->uuid }}" name="uuid">
    USER NAME<input type="text" value="{{ $user->user_name }}" disabled>
    <br>
    FULL NAME<input type="text" name="full_name" value="{{ $user->full_name }}">
    <br>
    SEX <select name="sex">
        <option value="Nam" {{ $user->sex == 'Nam'?'selected':'' }}>Nam</option>
        <option value="Nữ" {{ $user->sex == 'Nữ'?'selected':'' }}>Nữ</option>
    </select>
    <br>
    PHONE NUMBER<input type="text" name="phone_number" value="{{ $user->phone_number }}">
    <br>
    EMAIL <input type="text" name="email" value="{{ $user->email }}">
    <br>
    ADDRESS <input type="text" name="address" value="{{ $user->address }}">
    <br>
    <button type="submit">Update</button>

</form>