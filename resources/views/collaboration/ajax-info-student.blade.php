 
<div>
    <div class="row">
        <div class="col-lg-7 card-info mx-auto" style="list-style: none">
            <div class="card   p-lg-4" style="border-radius:20px">
                <div class="row no-gutters p-2">
                  <div class="col-md-4 ">
                    <img src="{{ $student->avatar_img_path }}" class="card-img card-body"  alt="{{ $student->avatar_img_path }}">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-title">
                          <i class="fas fa-star" style="width:1em"></i> 
                           {{ $student->full_name }}
                        </div>
                      <div class="card-text py-2"><i class="fas fa-address-book" style="width:1em"></i> <span> {{ $student->student_code }} </span> </div>
                      <div class="card-text py-2">
                         @if ($student->sex=="Nam")
                            <i class="fas fa-male" style="width:1em"></i> <span >{{ $student->sex }}</span>    
                        @else
                            <i class="fas fa-female" style="width:1em"></i> <span  >{{ $student->sex }}</span>
                        @endif
                        </div>
                      <div class="card-text py-2"> <i class="fas fa-mobile" style="width:1em"></i> <span  >{{ $student->phone_number }}</span> </div>
                      <div class="card-text py-2"> <i class="fas fa-envelope" style="width:1em"></i> <span style="font-size:0.9em" >{{ $student->email }}</span></div>
                      <div class="card-text {{ $student->soft_deleted == 'false'? 'badge badge-success-neo':'badge badge-danger-neo' }}"><small class="text-muted "> <i class="{{ $student->soft_deleted=='false'?'fas fa-user-check':'<i class="fas fa-user-alt-slash"></i>' }}"></i> {{ $student->soft_deleted == 'false'? 'Đang học': 'Khóa' }} </small></div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <h4 class="text-center   p-2 m-2 title">Các môn đang học</h4>
    <div class="table-responsive">
        <table class="table col-12">
            <thead>
                <tr>
                    <td>Lớp học</td>
                    <td class="text-center">Môn học</td>
                    <td>Ngày bắt đầu</td>
                    <td>Ngày kết thúc</td>
                    <td id="responsive-td4">Số buổi nghỉ tối đa</td>
                    <td id="responsive-td4">Số buổi nghỉ hiện tại</td>
                </tr>
            </thead>
            <tbody>
                @foreach($studentSubjects as $detail)
                <tr>    
                    <td>{{ $detail->class_name }}</td>
                    <td class="text-center" id="responsive-td4">{{ $detail->subject_name }}</td>
                    <td id="responsive-td4" >{{ $detail->date_start }}</td>
                    <td id="responsive-td4">{{ $detail->date_end }}</td>
                    <td class="text-center">{{ $detail->subject_days_fail }}</td>
                    <td class="text-center" >{{ $detail->count_days_fail_now }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>