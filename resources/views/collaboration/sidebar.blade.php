
<nav id="sidebar">
	<div class="fixed-sidebar">
	  <div class="sidebar-header">
		{{-- <div class="rounded-circle" style="background-image:url('{{ Auth::user()->avatar_img_path }}')"> --}}
		<div class="rounded-circle">
		  <img src="{{ Auth::user()->avatar_img_path }}" alt="{{ Auth::user()->avatar_img_path }}" width="100%" >
		</div>
   </div>
  
   <ul class="list-unstyled components">
	   <div class="text-center" style="background-color: #1EBD9E;"> 
		 <span class="span-teacher" > {{ Auth::user()->full_name }} </span>   
	   </div>
	   <li class="date-teach">
		 <a href="{{ route('collaboration-home') }}"> <i class="fas fa-home"></i> Trang chủ</a>
	   </li>
	   <li class="date-teach">
		<a href="{{ route('search-student-view') }}"> <i class="fas fa-home"></i> Tra cứu sinh viên</a>
	  </li>
	   {{--  <li class="date-teach">
		 <a href="{{ route('get-class-subjects-teacher') }}">Danh sách lớp dạy</a>
	   </li>  --}}
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