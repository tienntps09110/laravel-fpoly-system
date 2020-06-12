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

 
@if(session('Danger'))
<div class="alert-danger-neo text-center">
    {{session('Danger')}}
</div>
@elseif(session('Success'))
<div id="success" class="alert-success-neo text-center">
    {{session('Success')}}
</div>
@endif
<form method="post">
    @csrf
    <!-- content -->
    <div class="px-lg-5">
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
                    <table class="table table-light" id="teacher-show">
                        {{-- @foreach ($teachers as $teacher) --}}
                        {{-- <tr><td> <input type="radio" value="{{ $teacher->uuid }}" id="teacher" name="gv"> <label for="{{ $teacher->full_name }}"> {{ $teacher->full_name }} </label></td></tr> --}}
                        {{-- @endforeach --}}
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
            <div class="box cong-cu-phan-lop p-4">
                <h3 class="alert-success-neo mx-lg-4 p-2 text-center">Công cụ Phân lớp</h3> 
                <div class="">
                    <div class="row">
                        <div class="col-lg-4 px-5 py-2">
                            <label for="lop"> Lớp    </label> 
                                <select name="class_id" id="lop" class="form-control"> 
                                    <option selected disabled>Chọn lớp</option>    
                                    @foreach ($class as $classDetail)
                                            <option value="{{ $classDetail->id }}">{{ $classDetail->name }}</option>
                                        @endforeach
                                </select>
                         
                        </div>
                        <div class="col-lg-4 px-5 py-2">
                            <label for="mon"> Môn </label>
                            <select name="subject_id" id="mon" disabled class="form-control">
                                <option selected disabled>Chọn môn</option>
                            </select>
                        </div>
                        <div class="col-lg-4 px-5 py-2">
                            <label for="thu-hoc"> Chọn Các Thứ học trong tuần   </label>
                            <select name="" id="thu-hoc" disabled class="form-control" >
                                <option selected disabled>Chọn thứ </option>
                                <option value="0">Chủ nhật</option>
                                <option value="1">Thứ hai</option>
                                <option value="2">Thứ ba</option>
                                <option value="3">Thứ tư</option>
                                <option value="4">Thứ năm</option>
                                <option value="5">Thứ sáu</option>
                                <option value="6">Thứ bảy</option>
                            </select>   
                            <div id='result-weekday'></div>
                            <script>
                                var arrayDay = [];
                                $(document).ready(function(){
                                    $("#thu-hoc").change(function(){
                                        var t = $(this).val();
                                        var show_t = $("#thu-hoc").children("option[value='"+t+"']").text();
                                        
                                        $('#result-weekday').append(`<div class="badge badge-pill badge-primary" style="padding:0.3em 0.5em;font-weight:normal">
                                                                        <span class='small'>${show_t}</span> 
                                                                        <span class='close-badge' id='${t}'><i class="fas fa-times" style="cursor:pointer;transform:scale(0.8)" ></i></span>
                                                                        <input class='days_study' id='' name='days_study[]' value='${t}' hidden>  
                                                                    </div>
                                                                    `);
                                        arrayDay.push(t);
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
                        <div class="col-lg-4 px-5 py-2">
                            <label for="from-date">Từ ngày</label>
                            <input type="date" disabled name="datetime_start" id="from-date" class="form-control">
                        </div>
                        <div class="col-lg-4 px-5 py-2">
                            <label for="to-date">Đến ngày</label>
                            <input type="date" disabled name="datetime_end" id="to-date" class="form-control">
                            
                        </div>
                        <div class="col-lg-4 px-5 py-2">
                            <label for="ca"> Ca</label>
                            <select name="study_time_id" id="ca" disabled class="form-control">
                                <option selected disabled>Chọn ca</option>
                            </select>
                            
                        </div>
                        <div class="col-lg-4 px-5 py-2">
                                <label for=""> Giáo viên Phụ trách</label>
                                <button id="chon-giao-vien" type="button" class="btn btn-block btn-primary-neo" data-toggle="modal" data-target="#exampleModalCenter" disabled>
                                    Chọn giảng viên
                                </button><div></div>
                            </div>
                        <div class="col-lg-4 px-5 py-2">
                                
                            </div>
                        <div class="col-lg-4 px-5 py-2">
                            <label for=" ">  &nbsp; </label>
                            <button type="submit" class="btn  btn-block btn-success-neo" id="submit-form" disabled>Xác nhận</button>
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
        classM.change(function(){
            fromDate.val('');
            fromDate.prop( "disabled", true );
            toDate.val('');
            toDate.prop( "disabled", true );
            studyTime.html('');
            studyTime.append('<option selected disabled>Chọn ca</option>');
            studyTime.prop( "disabled", true );
            subject.prop( "disabled", false );
            checkCreateClass(1);
        });
        subject.change(function(){
            fromDate.val('');
            toDate.val('');
            studyTime.html('');
            studyTime.append('<option selected disabled>Chọn ca</option>');
            if(teacher){
                $("#chon-giao-vien").next().html('');
            }
            studyTime.prop( "disabled", true );
            dayStudy.prop( "disabled", false );
        })
        dayStudy.change(function(){
            fromDate.val('');
            toDate.val('');
            fromDate.prop( "disabled", false );
            studyTime.html('')
            studyTime.append('<option selected disabled>Chọn ca</option>');
            studyTime.prop( "disabled", true );
        })
        fromDate.change(function(){
            toDate.prop( "disabled", false );
        })
        toDate.change(function(){
            studyTime.prop( "disabled", false );
            checkCreateClass(2);
        })
        studyTime.change(function(){
            $('#chon-giao-vien').prop("disabled", false);
            checkCreateClass(3);
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
                day_study:arrayDay?arrayDay:null,
                function:redirect
            },
            success:function(data) {
                switch(redirect){
                    case 1:
                        // CHECKSUBJECT
                        subject.html('');
                        subject.append('<option selected disabled>Chọn môn</option>');
                        for(sub of data){
                            subject.append('<option value="'+sub.id+'">'+sub.name+'</option>');
                        }
                    break;
                    case 2:
                        // CHECK AND RETURN STUDY DAY
                        console.log('DATA: ' + JSON.stringify(data));

                        if(typeof data == 'string'){
                            // console.log(data);
                            toDate.val('');
                            fromDate.val('');
                            // $(".navbar").after("<div id='danger' class='alert-danger-neo text-center'>"+data+"</div>")
                            // setTimeout( ()=>{$(".navbar").next().fadeOut();}, 3000);
                            toastMess (data, 5000,'error');
                        }else{
                            for(study of data){
                                studyTime.prop( "disabled", false);
                                studyTime.append(`
                                        <option value="${study.id}">${study.name} (${study.time_start} -  ${study.time_end})</option>
                                        `);
                            }
                        }
                    break;
                    case 3:
                        console.log(data);

                        for(teacher of data){
                            let result = `
                                <tr>
                                    <td>
                                        <input type="radio" value="${teacher.uuid}" id="teacher" name="gv"> 
                                        <label for="${teacher.full_name}"> ${teacher.full_name} </label>
                                    </td>
                                </tr>
                            `;
                            $('#teacher-show').append(result);
                        }
                        teacher = $('#teacher-show tr td input[name="gv"]');
                        getTeacher();
                    break;
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
    function getTeacher(){
        teacher.click(function(){
            // console.log(teacher);
            nameGvChecked = $(this).next().text();
            idGvChecked = $(this).attr('value');
        })
        $("#chon-gv").click(function(){
            $(".modal").hide()
            $("#chon-giao-vien").parent().next().html( "<label for=''>  &nbsp; </label> <input id='chon-giao-vien'  class='teacher  btn-block text-center' type='text' value='"+nameGvChecked+"' disabled class='form-control ml-3'>");
            $("#chon-giao-vien").parent().next().append( "<input class='teacher' name='teacher_uuid' type='text' value='"+idGvChecked+"' hidden class='form-control ml-3'>");
            teacher = idGvChecked;
            $('#submit-form').prop("disabled", false);
            checkCreateClass(4);
        })
    }
</script>
@endsection
