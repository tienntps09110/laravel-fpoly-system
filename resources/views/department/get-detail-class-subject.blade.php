<h1>THÔNG TIN MÔN HỌC CỦA LỚP</h1>
{{ json_encode($cLassSubject) }}


<h1>THÔNG TIN NGÀY HỌC</h1>

@foreach ($daysClassSubject as $daysDetail)
    {{ json_encode($daysDetail) }}
    <div>
        <h1>{{ $daysDetail->user_full_name }}</h1>
        <h6>{{ $daysDetail->date }}</h6>
        <a href="{{ route('update-day-class-subject-view', $daysDetail->id) }}">Đổi người dạy</a>
    </div>
    <hr>
@endforeach