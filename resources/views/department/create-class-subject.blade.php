@extends('department.home')
@section('contentPDT')
@if($errors->any())
    <div class="col-lg-6 mx-auto">
        <div class="alert alert-warning">
            <h3> Thông báo </h3>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    </div>
@endif
<div id="danger">
    {{session('Danger')?session('Danger'):''}}
</div>
<div id="success">
    {{session('Success')?session('Success'):''}}
</div>
<form method="post">
    @csrf
    <!-- content -->
    <div class="px-5">
        <!-- Danh sách Giáo viên chưa có lịch dạy (ẩn) -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Vui  lòng chọn giáo viên </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <table class="table table-light">
                        @foreach ($teachers as $teacher)
                        <tr><td> <input type="radio" value="{{ $teacher->uuid }}" id="teacher" name="gv"> <label for="{{ $teacher->full_name }}"> {{ $teacher->full_name }} </label></td></tr>
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" id="chon-gv" data-dismiss="modal">Lưu </button>
                  {{-- <button type="button"  class="btn btn-primary">Save changes</button> --}}
                </div>
              </div>
            </div>
          </div>
        <!-- Công cụ Phân lớp -->
        <div class="container-fluid py-3">
            <div class="box cong-cu-phan-lop">
                <h3 class="text-center">Công cụ Phân lớp</h3>
                <div class="">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="container-fluid my-4">
                                <label for="lop"> Lớp 
                                    <select name="class_id" id="lop" class="form-control"> 
                                        <option selected disabled>Chọn lớp</option>    
                                        @foreach ($class as $classDetail)
                                                <option value="{{ $classDetail->id }}">{{ $classDetail->name }}</option>
                                            @endforeach
                                    </select>
                                </label> 
                            </div>
                            <div class="container-fluid ">
                                <label for="thu-hoc"> Chọn Các Thứ học trong tuần   
                                    <select name="" id="thu-hoc" class="form-control" >
                                        <option selected disabled>Chọn thứ </option>
                                        <option value="0">Chủ nhật</option>
                                        <option value="1">Thứ hai</option>
                                        <option value="2">Thứ ba</option>
                                        <option value="3">Thứ tư</option>
                                        <option value="4">Thứ năm</option>
                                        <option value="5">Thứ sáu</option>
                                        <option value="6">Thứ bảy</option>
                                    </select>   
                                </label>
                                <script>
                                    $(document).ready(function(){
                                        $("#thu-hoc").change(function(){
                                            var t = $(this).val();
                                            var show_t = $("#thu-hoc").children("option[value='"+t+"']").text();
                                            
                                            $('#result-weekday').append(`<div class="badge badge-pill badge-primary" style="padding:0.3em 0.5em;font-weight:normal">
                                                                            <span class='small'>${show_t}</span> 
                                                                            <span class='close-badge' id='${t}'><i class="fas fa-times" style="cursor:pointer;transform:scale(0.8)" ></i></span>
                                                                            <input class='' id='' name='days_study[]' value='${t}' hidden>  
                                                                        </div>
                                                                        `);
                                            $("#thu-hoc").val("");
                                            $("#thu-hoc").children("option[value='"+t+"']").hide();
                                            $(".close-badge").click(function(){
                                                $(this).parent().remove();
                                                var unhide_target = $(this).attr("id");
                                                $("#thu-hoc").children("option[value="+unhide_target+"]").show();
                                            })
                                        })
                                    })    
                                </script>
                            </div>
                            <div class="container-fluid">
                                <div id='result-weekday'></div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="container-fluid my-4">
                                <div class="container-fluid my-4">
                                    <label for="from-date">Từ ngày
                                        <input type="date" disabled name="datetime_start" id="from-date" class="form-control">
                                    </label>
                                </div>
                                <label for="mon"> Môn
                                    <select name="subject_id" id="mon" disabled class="form-control">
                                        <option selected disabled>Chọn môn</option>
                                            {{-- @foreach ($subjects as $subject) --}}
                                                {{-- <option value="{{ $subject->id }}">{{ $subject->name }}</option> --}}
                                            {{-- @endforeach --}}
                                    </select>
                                </label>
                            </div>       
                        
                            <div class="container-fluid my-4">
                                <h5>Giáo viên Phụ trách</h5>
                                <div class="form-inline">
                                    <button id="chon-giao-vien" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        Chon
                                    </button>                                    <div></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="container-fluid my-4">
                                <div class="container-fluid my-4">
                                    <label for="to-date">Đến ngày
                                        <input type="date" disabled name="datetime_end" id="to-date" class="form-control">
                                    </label>
                                </div>
                                <label for="ca"> Ca
                                    <select name="study_time_id" id="ca" disabled class="form-control">
                                        <option selected disabled>Chọn ca</option>
                                        {{-- 
                                        @foreach ($studyTime as $studyTimeDetail)
                                            <option value="{{ $studyTimeDetail->id }}">{{ $studyTimeDetail->name }} ({{ $studyTimeDetail->time_start . ' - ' .$studyTimeDetail->time_end }})</option>
                                        @endforeach --}}
                                    </select>
                                </label>
                                    
                            </div>
                            <div class="container-fluid my-4">
                                <button type="submit" class="btn  btn-primary mt-4">Xác nhận</button>
                            </div>
                        </div>
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    var nameGvChecked = null;
    var idGvChecked = null;
    var classM = $("#lop");
    var subject = $("#mon");
    var studyTime = $("#ca");
    var teacher = null;
    var fromDate = $('#from-date');
    var toDate = $('#to-date');
    var dayStudy = $('#thu-hoc');

    $(document).ready(function(){    
        $("input[name='gv']").click(function(){
            nameGvChecked = $(this).next().text();
            idGvChecked = $(this).attr('value');
        })
        $("#chon-gv").click(function(){
            $(".modal").hide()
            $("#chon-giao-vien").next().html( "<input id='chon-giao-vien'  class='teacher' type='text' value='"+nameGvChecked+"' disabled class='form-control ml-3'>");
            $("#chon-giao-vien").next().append( "<input class='teacher' name='teacher_uuid' type='text' value='"+idGvChecked+"' hidden class='form-control ml-3'>");
            teacher = idGvChecked;
            checkCreateClass();
        })
        classM.change(function(){
            checkCreateClass(1);
        });
        subject.change(function(){
            fromDate.prop( "disabled", false );
        })
        fromDate.change(function(){
            toDate.prop( "disabled", false );
        })
        toDate.change(function(){
            checkCreateClass(2);
        })
    });
    
    function checkCreateClass(redirect){
        $.ajax({
            type:'POST',
            url:'{{ route('check-class-subject-post') }}',
            data:{
                _token: '{{ csrf_token() }}',
                class_id:classM.val()?classM.val():null,
                subject_id:subject.val()?subject.val():null,
                study_id:studyTime.val()?studyTime.val():null,
                user_manager_uuid:teacher?teacher:null,
                date_start:fromDate.val()?fromDate.val():null,
                date_end:toDate.val()?toDate.val():null,
                day_study:dayStudy.val()?dayStudy.val():null,
                function:redirect
            },
            success:function(data) {
                switch(redirect){
                    case 1:
                        // CHECKSUBJECT
                        subject.html('');
                        subject.prop( "disabled", false );
                        subject.append('<option selected disabled>Chọn môn</option>');
                        for(sub of data){
                            subject.append('<option value="'+sub.id+'">'+sub.name+'</option>');
                        }
                    break;
                    case 2:
                        // CHECK AND RETURN STUDY DAY
                        console.log('DATA: ' + JSON.stringify(data));

                        if(typeof data == 'string'){
                            console.log(data);
                            toDate.val('');
                            $('#danger').html(data);
                            setTimeout( ()=>{$('#danger').html('');}, 3000);
                        }
                        for(study of data){
                            studyTime.prop( "disabled", false);
                            studyTime.append(`
                                    <option value="${study.id}">${study.name} (${study.time_start} -  ${study.time_end})</option>
                                    `);
                        }
                    break;
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>
@endsection
