@extends(CheckRole::role()->code == 'admin' ? 'admin.home' : 'department.home')
@section(CheckRole::role()->code == 'admin' ? 'contentAdmin' : 'contentPDT')
<div class="container-fluid  p-4">
    <div class="box p-4">
       
        {{-- {{ json_encode($cLassSubject) }} --}}

        <div class="title p-lg-4 ">
            THÔNG TIN & CẬP NHẬT MÔN HỌC : <span class="font-weight-bold ml-4" id="ten-mon"> {{ $cLassSubject->subject_name }} </span>
            <a id='backward' href="{{ route('get-class-subjects') }}"><i class="fas fa-sign-out-alt    "></i></a>
        </div>
        <div class="row pb-3">
            {{-- {{ json_encode($cLassSubject) }} --}}
            <div class="col-lg-3    p-lg-3 p-1   text-center">Lớp:</div>
            <div class="col-lg-3    p-lg-3 p-1  text-center font-weight-bold"><span   id="ten-mon">{{ $cLassSubject->class_name }} </span></div>
            <div class="col-lg-3    p-lg-3 p-1   text-center">Giảng viên phụ trách:</div>
            <div class="col-lg-3    p-lg-3 p-1  text-center font-weight-bold">{{ $cLassSubject->user_full_name }} </div>
            <div class="col-lg-3    p-lg-3 p-1 text-center ">Ngày bắt đầu:</div>
            <div class="col-lg-3    p-lg-3 p-1  text-center font-weight-bold">{{ $Carbon::parse($cLassSubject->datetime_start)->format('d/m/Y') }} </div>
            <div class="col-lg-3    p-lg-3 p-1   text-center">Ngày kết thúc:</div>
            <div class="col-lg-3    p-lg-3 p-1   text-center font-weight-bold"> {{ $Carbon::parse($cLassSubject->datetime_end)->format('d/m/Y') }}  </div>
            <div class="col-lg-3    p-lg-3 p-1   text-center">Ca học:</div>
            <div class="col-lg-3    p-lg-3 p-1   text-center font-weight-bold"> {{ $cLassSubject->study_time_name }} (  {{ $cLassSubject->study_time_start }} - {{ $cLassSubject->study_time_end }} )</div> 
            <div class="col-lg-3    p-lg-3 p-1   text-center">Thứ học:</div>
            <div class="col-lg-3    p-lg-3 p-1   text-center font-weight-bold">
                @for($i = 0; $i < count(json_decode($cLassSubject->days_week)); $i++)
                    <span class="badge badge-pill badge-primary badge-primary-neo" style="">{{ $Core::dayString(json_decode($cLassSubject->days_week)[$i])}}</span>  
                @endfor 
            </div> 
        </div>
        <div class="alert alert-success-neo text-center d-none" id="resultAjaxSuccess"></div>

        <div id="load-days-cs" class="p-lg-4">
            
        </div>
    </div>
</div>
 <script>
     $(document).ready(function(){
        
        $.ajax({
            url: window.location + '?get_json=ddsaahJIDSA3213hIHAO0e12jkUADI9231jdiI11',
            method: 'GET',
            success(data){
                // console.log(data)
                $('#load-days-cs').html('')
                $('#load-days-cs').html(data)
            }
        });
     });
 </script>


 

@endsection