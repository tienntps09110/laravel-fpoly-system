<h1>THÔNG TIN MÔN HỌC CỦA LỚP</h1>
{{ json_encode($cLassSubject) }}


<h1>THÔNG TIN NGÀY HỌC</h1>

@foreach ($daysClassSubject as $daysDetail)
    {{ json_encode($daysDetail) }}
    <hr>
@endforeach