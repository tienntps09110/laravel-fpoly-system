 

<nav id="sidebar" >
  <div class="fixed-sidebar">
    <div class="sidebar-header">
      <div class="rounded-circle">
        <img src="{{ $CoreS::user()->avatar_img_path }}" alt="{{ $CoreS::user()->avatar_img_path }}"   >
        {{-- <div class="avatar" style="background-image: url({{ $CoreS::user()->avatar_img_path }})"></div> --}}
      </div>
    </div>

<ul class="list-unstyled components">
    <li class="text-center">
      <span class="small" style="display:block">Sinh viên:</span>
      {{ $CoreS::user()->full_name }}
    </li>
    <li class="date-teach">
      <a href=" {{route('student-login-post')}}"> <i class="fas fa-home    "></i> Trang chủ</a>
    </li>
    <li class="date-teach">
      <a href="{{ route('get-class-subjects-student') }}"> <i class="fas fa-edit    "></i>Danh sách Môn học</a>
    </li>
    <li class="date-teach">
      <a href="{{ route('get-class-subjects-days-student') }}"> <i class="fas fa-list    "></i> Lịch học</a>
    </li>
    <li class="date-teach">
      <a  > <i class="fas fa-envelope    "></i> Hộp thư</a>
    </li>
    
</ul>
<ul class="list-unstyled CTAs">
  <li>
    <form action="{{ route('student-logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-link logout"> <i class="fas fa-sign-out-alt"></i> Đăng xuất  </button> 
    </form>
  </li>
</ul>
  </div>
</nav>
      
              {{-- mobie sidebar --}}
      
              