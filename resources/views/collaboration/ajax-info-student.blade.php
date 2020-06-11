<div>
    <div class="row">
        <div class="col-lg-6 col-sm-12 card-info mx-auto" style="list-style: none">
            <div class="card mb-3" style="max-width: 540px;border-radius:20px">
                <div class="row no-gutters p-2">
                  <div class="col-md-4 mt-5">
                    <img src="{{ $student->avatar_img_path }}" class="card-img" alt="{{ $student->avatar_img_path }}">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fas fa-star"></i>  {{ $student->full_name }}</h5>
                      <p class="card-text"><i class="fas fa-address-book"></i> <span style="margin-left:5px"> {{ $student->student_code }} </span> </p>
                      <p class="card-text">
                         @if ($student->sex=="Nam")
                            <i class="fas fa-male"></i> <span style="margin-left:15px">{{ $student->sex }}</span>    
                        @else
                            <i class="fas fa-female"></i> <span style="margin-left:15px">{{ $student->sex }}</span>
                        @endif
                        </p>
                      <p class="card-text"> <i class="fas fa-mobile"></i> <span style="margin-left:10px">{{ $student->phone_number }}</span> </p>
                      <p class="card-text"> <i class="fas fa-envelope"></i> <span style="margin-left:5px;font-size:12pt">{{ $student->email }}</span></p>



                      <p class="card-text {{ $student->soft_deleted == 'false'? 'badge badge-success':'badge badge-danger' }}"><small class="text-muted "> <i class="{{ $student->soft_deleted=='false'?'fas fa-user-check':'<i class="fas fa-user-alt-slash"></i>' }}"></i> {{ $student->soft_deleted == 'false'? 'Đang học': 'Khóa' }} </small></p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <hr>
    <h4 class="text-center">Các môn đang học</h4>
    <div class="table-responsive">
        <table class="table col-12">
            <thead>
                <tr>
                    <td>Lớp</td>
                    <td class="text-center">Môn</td>
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