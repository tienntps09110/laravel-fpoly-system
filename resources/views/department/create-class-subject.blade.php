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
<div>
    {{session('Danger')?session('Danger'):''}}
</div>
<div>
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
                        <tr><td> <input type="radio" value="{{ $teacher->uuid }}" id="{{ $teacher->full_name }}" name="gv"> <label for="{{ $teacher->full_name }}"> {{ $teacher->full_name }} </label></td></tr>
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
                                            @foreach ($class as $classDetail)
                                                <option value="{{ $classDetail->id }}">{{ $classDetail->name }}</option>
                                            @endforeach
                                    </select>
                                </label> 
                            </div>
                            <div class="container-fluid ">
                                <label for="thu-hoc"> Chọn Các Thứ học trong tuần   
                                    <select name="" id="thu-hoc" class="form-control" >
                                        <option value="">Chọn thứ </option>
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
                                <label for="mon"> Môn
                                    <select name="subject_id" id="mon" class="form-control">
                                        <option selected disabled>Chọn môn</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                    </select>
                                </label>
                            </div>       
                            <div class="container-fluid my-4">
                                <label for="from-date">Từ ngày
                                    <input type="date" name="datetime_start" id="from-date" class="form-control">
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
                                <label for="ca"> Ca
                                    <select name="study_time_id" id="ca" class="form-control">
                                        @foreach ($studyTime as $studyTimeDetail)
                                            <option value="{{ $studyTimeDetail->id }}">{{ $studyTimeDetail->name }} ({{ $studyTimeDetail->time_start . ' - ' .$studyTimeDetail->time_end }})</option>
                                        @endforeach
                                    </select>
                                </label>
                                    
                            </div>
                            <div class="container-fluid my-4">
                                <label for="to-date">Đến ngày
                                    <input type="date" name="datetime_end" id="to-date" class="form-control">
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
    $(document).ready(function(){
        var nameGvChecked = null;
        var idGvChecked = null;

        $("input[name='gv']").click(function(){
            nameGvChecked = $(this).next().text();
            idGvChecked = $(this).attr('value');
        })
        $("#chon-gv").click(function(){
            $(".modal").hide()
            $("#chon-giao-vien").next().html( "<input id='chon-giao-vien' type='text' value='"+nameGvChecked+"' disabled class='form-control ml-3'>");
            $("#chon-giao-vien").next().append( "<input name='teacher_uuid' type='text' value='"+idGvChecked+"' hidden class='form-control ml-3'>");
        })
    })
</script>
@endsection
