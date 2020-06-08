<div>
    <div class="row">
        <div class="col-2">
            <img style="width:100%" src="{{ $student->avatar_img_path }}" alt="{{ $student->full_name }}">
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-3">
                    <h6>MSSV</h6>
                    <h6>Họ và tên</h6>
                    <h6>Giới tính</h6>
                    <h6>Số điện thoại</h6>
                    <h6>Email</h6>
                    <h6>Trạng thái</h6>
                </div>
                <div class="col-4">
                    <h6>{{ $student->student_code }}</h6>
                    <h6>{{ $student->full_name }}</h6>
                    <h6>{{ $student->sex }}</h6>
                    <h6>{{ $student->phone_number }}</h6>
                    <h6>{{ $student->email }}</h6>
                    <h6 class="{{ $student->soft_deleted == 'false'? 'text-success':'text-danger' }}">{{ $student->soft_deleted == 'false'? 'Kích hoạt': 'Khóa' }}</h6>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h4>Các môn đang học</h4>
    <table class="table col-12">
        <tr>
            <td>Lớp</td>
            <td>Môn</td>
            <td>Ngày bắt đầu</td>
            <td>Ngày kết thúc</td>
            <td>Số buổi nghỉ tối đa</td>
            <td>Số buổi nghỉ hiện tại</td>
        </tr>
        @foreach($studentSubjects as $detail)
        <tr>    
            <td>{{ $detail->class_name }}</td>
            <td>{{ $detail->subject_name }}</td>
            <td>{{ $detail->date_start }}</td>
            <td>{{ $detail->date_end }}</td>
            <td>{{ $detail->subject_days_fail }}</td>
            <td>{{ $detail->count_days_fail_now }}</td>
        </tr>
        @endforeach
    </table>
</div>