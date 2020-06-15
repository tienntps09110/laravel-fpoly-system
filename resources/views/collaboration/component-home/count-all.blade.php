<div class="col-lg-4 py-3  ">
    <div class="box border d-flex flex-wrap align-content-center justify-content-center">
      <div class="text-center text-primary">
        <i class="fas fa-chalkboard-teacher    "></i>  
        Giảng viên 
        <a href="{{ route('collaboration-excel-teacher') }}" title="Xuất tệp tin excel">
            <span id="chu-noi">{{ $countAll->teachers }}</span>
        </a>
      </div>
    </div>
</div>
<div class="col-lg-4 py-3  ">
    <div class="box border d-flex flex-wrap align-content-center justify-content-center">
      <div class="text-center text-info">
        <i class="fas fa-leaf    "></i>  
        Sinh viên  
        <a href="{{ route('collaboration-excel-student') }}" title="Xuất tệp tin excel">
            <span id="chu-noi">{{ $countAll->students }}</span>
        </a>
      </div>
    </div>
</div>
<div class="col-lg-4 py-3  ">
    <div class="box border d-flex flex-wrap align-content-center justify-content-center">
        <div class="text-center text-warning">
            <i class="fas fa-tree    "></i>
            Lớp học  
        <a href="{{ route('collaboration-excel-class') }}" title="Xuất tệp tin excel">
            <span id="chu-noi">{{ $countAll->class }}</span>
        </a>
        </div>
    </div>
</div>