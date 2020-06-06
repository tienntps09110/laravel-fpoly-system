<nav id="sidebar">
    <div class="fixed-sidebar">
        <div class="sidebar-header">
            <div class="rounded-circle">
                <img src="{{ Auth::user()->avatar_img_path }}" alt="{{ Auth::user()->avatar_img_path }}" width="100%" >
              </div>        </div>
    
        <ul class="list-unstyled components">
            <p class="text-center" style="background-color: #1EBD9E;">{{ Auth::user()->full_name }}</p>
            <li>
                <a href="{{route('department-home')}}">Nhập thông tin <span style="float: left;"><i class="fas fa-user-plus"></i></span>
                </a>
            </li>
            <li>
                <a href="{{route('create-class-subject-view')}}">Phân lớp <span style="float: left;"><i class="fas fa-divide"></i></span>
                </a>
            </li>
            <li>
                <a href="{{ route('get-class-subjects') }}">Danh sách môn của lớp<span style="float: left;"><i class="fas fa-list"></i></span> </a>
            </li>
            <li>
                <a href="{{ route('get-class-subjects') }}">Danh sách giáo viên<span style="float: left;"><i class="fas fa-list"></i></span> </a>
            </li>
            <li>
                <a href="{{ route('get-class-subjects') }}">Danh sách sinh viên<span style="float: left;"><i class="fas fa-list"></i></span> </a>
            </li>
            {{-- <li>
                <a href="#">Tổng quát</a>
            </li> --}}
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