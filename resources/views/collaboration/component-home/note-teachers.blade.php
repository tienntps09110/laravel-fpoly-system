<div class="nhan-xet">
    <h5>Nhận xét giáo viên</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th  class="th-lg">Giáo viên</th>
                    <th class="th-lg" >Lớp</th>
                    <th class="th-lg" >Môn</th>
                    <th class="th-lg">Nhận xé 1t</th>
                </tr>

            </thead>
            {{--  {{ $noteTeacher }}  --}}
            <tbody>
                @foreach ($noteTeacher as $item)
                  <tr>
                      <td id="responsive-td1" scope="row">{{ $item->teacher_full_name }}</td>
                      <td id="responsive-td2"> {{ $item->class_name }}</td>
                      <td id="responsive-td3">{{ $item->subject_name }}</td>
                      <td id="responsive-td4"> {{ $item->note }} </td>
                  </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>