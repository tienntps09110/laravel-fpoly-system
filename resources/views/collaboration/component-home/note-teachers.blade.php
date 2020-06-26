{{--  <div class="nhan-xet">  --}}
    <div class="text-center alert-primary-neo p-2 my-3"  >Nhận xét giáo viên</div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="th-lg">Giáo viên</th>
                    <th class="th-lg" >Lớp học</th>
                    <th class="th-lg" >Môn học</th>
                    <th class="th-lg">Nhận xét</th>
                </tr>

            </thead>
            {{--  {{ $noteTeacher }}  --}}
            <tbody>
                @foreach ($noteTeacher as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td id="responsive-td1" scope="row">{{ $item->teacher_full_name }}</td>
                      <td id="responsive-td2"> {{ $item->class_name }}</td>
                      <td id="responsive-td3">{{ $item->subject_name }}</td>
                      <td id="responsive-td4"> {{ $item->note }} </td>
                  </tr>
                @endforeach
            </tbody>
        </table>

    </div>
{{--  </div>  --}}
{{-- <script src="{{ asset('js/script.js') }}"></script> --}}