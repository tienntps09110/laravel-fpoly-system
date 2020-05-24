LIST STUDENTS

@foreach ($students as $student)
    {{ $student }}    
    <img src="{{ $student->avatar_img_path }}" alt="{{ $student->full_name }}">
@endforeach