{{--  <div class="nhan-xet">  --}}
    <h4 class="text-center alert-primary-neo p-2 mb-3"  >Nhận xét giáo viên</h5>
    <div class="table-responsive">
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="th-lg">Giáo viên</th>
                    <th class="th-lg" >Lớp</th>
                    <th class="th-lg" >Môn</th>
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