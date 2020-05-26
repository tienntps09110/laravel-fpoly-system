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
                <div class="table-responsive">
                    <table class="table mt-5"  >
                        <tr>
                            <td>
                                <label for="lop"> Lớp 
                                    <select name="class_id" id="lop" class="form-control">
                                            @foreach ($class as $classDetail)
                                                <option value="{{ $classDetail->id }}">{{ $classDetail->name }}</option>
                                            @endforeach
                                    </select>
                                </label>
                            </td>
                            <td>
                                <label for="mon"> Môn
                                    <select name="subject_id" id="mon" class="form-control">
                                        <option selected disabled>Chọn môn</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                    </select>
                                </label>
                            </td>
                            <td>
                                <label for="ca"> Ca
                                    <select name="study_time_id" id="ca" class="form-control">
                                        @foreach ($studyTime as $studyTimeDetail)
                                            <option value="{{ $studyTimeDetail->id }}">{{ $studyTimeDetail->name }} ({{ $studyTimeDetail->time_start . ' - ' .$studyTimeDetail->time_end }})</option>
                                        @endforeach
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="thu-hoc"> Chọn Các Thứ học trong tuần   
                                    <select name="days_study[]" id="thu-hoc" class="form-control" >
                                        <option value="">Chọn thứ </option>
                                        <option value="0">Chủ nhật</option>
                                        <option value="1">Thứ hai</option>
                                        <option value="2">Thứ ba</option>
                                        <option value="3">Thứ tư</option>
                                        <option value="4">Thứ năm</option>
                                        <option value="5">Thứ sáu</option>
                                        <option value="6">Thứ bảy</option>
                                    </select>   
                                    {{-- <input id="them-thu" type="button" value="+ Add" class="btn btn-dark">                                   --}}
                                </label>
                               
                                <script>
                                    $(document).ready(function(){
                                        $("#thu-hoc").change(function(){
                                            var t = $(this).val();
                                            var show_t = $("#thu-hoc").children("option[value='"+t+"']").text();
                                       
                                            $('#result-weekday').append(`<div class="badge badge-pill badge-primary ">
                                                                            <span class='small '>${show_t}</span> 
                                                                            <span class='close-badge'><i class="fas fa-times" style="cursor:pointer;transform:scale(0.8)" ></i></span>
                                                                        </div><br>
                                                                        `);
                                            $(".close-badge").click(function(){
                                                console.log("abc")
                                            })
                                            $("#thu-hoc").children("option[value='']").hide();
                                            $("#thu-hoc").children("option[value='"+t+"']").hide();
                                        })
                                        
                                    })    
                                </script>

                            </td>
                            <td>
                                <label for="from-date">Từ ngày
                                    <input type="date" name="datetime_start" id="from-date" class="form-control">
                                </label>
                            </td>
                            <td>
                                <label for="to-date">Đến ngày
                                    <input type="date" name="datetime_end" id="to-date" class="form-control">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td id='result-weekday'></td>
                            <td>
                                <h5>Giáo viên Phụ trách</h5>
                                <div class="form-inline">
                                    <button id="chon-giao-vien" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        Chon
                                    </button>                                    <div></div>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn  btn-primary mt-4">Xác nhận</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Danh sách sau khi phân lớp -->
        {{-- <div class="container-fluid py-3">
            <div class="box ket-qua-phan-lop">
                <div class="text-center">
                    <h3 >Danh sách </br> Ngày học Chi tiết</h3>
                    <b class="ml-5 text-danger">Lớp: WD14301</b> 
                    <b class="ml-5 text-danger">Môn: PHP</b> 
                    <b class="ml-5 text-danger">Từ ngày: 01/06/2020</b> 
                    <b class="ml-5 text-danger">Đến ngày: 01/08/2020</b> 
                </div>
                <div class="table-responsive">
                    <table class="table mt-4">
                        <tr></tr>
                            <th>#</th>
                            <th>Ngày học</th>
                            <th>Ca học</th>
                            <th>Giáo viên</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="ngay-hoc" id="ngay-hoc" value="01/06/2020">
                            </td>
                            <td>
                                <select name="ca-hoc" id="">
                                    <option value="1">1</option>
                                    <option value="2" selected>2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </td>
                            <td>
                                <select name="giao-vien" id="">
                                    <option value="Nguyễn Thị Đẹp">Nguyễn Thị Đẹp</option>
                                    <option value="Nguyễn Thị Na" selected>Nguyễn Thị Na</option>
                                    <option value="Nguyễn Thị Mít">Nguyễn Thị Mít</option>
                                    <option value="Nguyễn Thị Ổi">Nguyễn Thị Ổi</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-outline-dark">Lưu</button>
                            </td>
                        </tr>
                    </table>
                    <button class="btn btn-pramry">Xác nhận</button>
                </div>
            </div>
        </div> --}}

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
        // })
        // Chỉnh sửa danh sách lịch học chi tiết
    })
</script>
@endsection

    {{-- CLASS
    <select name="class_id">
        <option selected disabled>Chọn lớp</option>
        @foreach ($class as $classDetail)
            <option value="{{ $classDetail->id }}">{{ $classDetail->name }}</option>
        @endforeach
    </select> --}}
    {{-- <br><br>
    SUBJECT<select name="subject_id">
        <option selected disabled>Chọn môn</option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
    <br><br> --}}
    {{-- TEACHER<select name="teacher_uuid">
        <option selected disabled>Chọn giảng viên</option>
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher->uuid }}">{{ $teacher->full_name }} ({{ $teacher->user_name }})</option>
        @endforeach
    </select>
    <br><br>
    STUDY TIME<select name="study_time_id"> --}}
        {{-- <option selected disabled>Chọn ca học</option> --}}
        {{-- @foreach ($studyTime as $studyTimeDetail)
            <option value="{{ $studyTimeDetail->id }}">{{ $studyTimeDetail->name }} ({{ $studyTimeDetail->time_start . ' - ' .$studyTimeDetail->time_end }})</option>
        @endforeach --}}
    {{-- </select>
    <br><br>
    DATE TIME START<input type="date" name="datetime_start">
    <br>
    DATE TIME END<input type="date" name="datetime_end">
    <br><br><br>
    {{-- Thứ học (1,2,3,4,5,6,0) --}}
    {{-- <br>
    Chủ nhật<input type="checkbox" name="days_study[]" value="0">
    Thứ 2<input type="checkbox" name="days_study[]" value="1">
    Thứ 3<input type="checkbox" name="days_study[]" value="2">
    Thứ 4<input type="checkbox" name="days_study[]" value="3">
    Thứ 5<input type="checkbox" name="days_study[]" value="4">
    Thứ 6<input type="checkbox" name="days_study[]" value="5">
    Thứ 7<input type="checkbox" name="days_study[]" value="6"> --}}

    {{-- <div class="g-recaptcha" data-sitekey="6LdvEvwUAAAAAHsMacx4FSqP7eM0pknMYvJiSsFV"></div> --}}
{{-- <script src='https://www.google.com/recaptcha/api.js'></script> --}}
