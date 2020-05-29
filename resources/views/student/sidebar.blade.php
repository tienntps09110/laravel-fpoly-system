<nav id="sidebar">
    <div class="fixed-sidebar">
        <div class="sidebar-header">
            <div class="avatar"><img src="{{ $CoreS::user()->avatar_img_path }}" width="200rem"></div>
        </div>
    
        <ul class="list-unstyled components">
            {{-- <p class="text-center" style="background-color: #1EBD9E;">{{ Auth::user()->full_name }}</p> --}}
            <li>
                <a href=" {{ route('get-class-subjects-student') }} ">Danh sách môn học <span style="float: left;"><i class="fas fa-user-plus"></i></span>
                </a>
            </li>
            <li>
                {{-- <a href="{{route('create-class-subject-view')}}">Phân lớp <span style="float: left;"><i class="fas fa-divide"></i></span> --}}
                </a>
            </li>
            <li>
                <a href="{{ route('get-class-subjects-days-student') }}">Lịch học <span style="float: left;"><i class="fas fa-list"></i></span> </a>
            </li>
        </ul>
    
        <ul class="list-unstyled CTAs">
            <li>
                <form action="{{ route('student-logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-default logout ml-5">LOGOUT <i class="fas fa-sign-out-alt"></i> </button>
                </form>
            </li>
        </ul>
    </div>
</nav>