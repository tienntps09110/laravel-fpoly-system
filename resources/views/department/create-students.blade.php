<hr>
{{-- ERROR --}}
{{-- <div>
    @if($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</div> --}}

{{-- SUCCESSFULLY --}}
{{-- <div>
    {{session('Success')?session('Success'):''}}
</div> --}}

{{-- CREATE STUDENT EXCEL --}}
CREATE STUDENT EXCEL
<form method="POST" action="{{ route('create-student-excel') }}" enctype="multipart/form-data">
    @csrf
    EXCEL FILE<input type="file" name="excel">
    <button type="submit">CREATE STUDENT</button>
</form>