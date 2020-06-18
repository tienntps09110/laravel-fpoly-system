
<nav id="sidebar" >
  <div class="fixed-sidebar">
    <div class="sidebar-header">
      <div class="rounded-circle">
        <img src="{{ Auth::user()->avatar_img_path }}" alt="{{ Auth::user()->avatar_img_path }}" width="100%" >
      </div>
 </div>

 <ul class="list-unstyled components">
     <li class="text-center">
       <span class="small" style="display:block">Giảng viên:</span>
        {{ Auth::user()->full_name }}
     </li>
     <li class="date-teach">
       <a href="{{ route('get-class-subject-teacher-today') }}"> <i class="fas fa-edit    "></i> Điểm danh</a>
     </li>
     <li class="date-teach">
       <a href="{{ route('get-class-subjects-teacher') }}"> <i class="fas fa-list    "></i> Danh sách lớp dạy</a>
     </li>
     <li class="date-teach">
       <a  > <i class="fas fa-envelope    "></i> Hộp thư</a>
     </li>
     
 </ul>
 <ul class="list-unstyled CTAs">
   <li>
     <form action="{{ route('logout') }}" method="post">
         @csrf
         <button type="submit" class="btn btn-link logout"> <i class="fas fa-sign-out-alt"></i> Đăng xuất  </button> 
     </form>
   </li>
 </ul>
  </div>
        </nav>

        {{-- mobie sidebar --}}

        