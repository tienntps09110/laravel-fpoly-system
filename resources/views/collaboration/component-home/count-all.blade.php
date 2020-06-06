<div class="col-sm-4 p-1 card-alert">
    <div class="box border d-flex flex-wrap align-content-center justify-content-center">
      <div class="text-center">
          Giáo viên <i class="fas fa-chalkboard-teacher    "></i>
          </br>
      <a href="{{ route('collaboration-excel-teacher') }}" title="Xuất tệp tin excel">
              <p id="chu-noi">{{ $countAll->teachers }}</p>
          </a>
      </div>
    </div>
</div>
<div class="col-sm-4 p-1">
    <div class="box border d-flex flex-wrap align-content-center justify-content-center">
      <div class="text-center">
          Sinh viên <i class="fas fa-chalkboard-teacher    "></i>
          </br>
          <a href="{{ route('collaboration-excel-student') }}" title="Xuất tệp tin excel">
              <p id="chu-noi">{{ $countAll->students }}</p>
          </a>
      </div>
    </div>
</div>
<div class="col-sm-4 p-1">
    <div class="box border d-flex flex-wrap align-content-center justify-content-center">
        <div class="text-center">
            Lớp học <i class="fas fa-chalkboard-teacher    "></i>
            </br>
          <a href="{{ route('collaboration-excel-class') }}" title="Xuất tệp tin excel">
            <p id="chu-noi">{{ $countAll->class }}</p>
          </a>
        </div>
    </div>
</div>