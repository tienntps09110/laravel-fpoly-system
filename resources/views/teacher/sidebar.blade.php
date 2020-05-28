
<nav id="sidebar">
            <div class="sidebar-header">
                 <div class="rounded-circle" style="background-image:url('{{ Auth::user()->avatar_img_path }}')"> </div>
                 <!-- <img class="rounded-circle" src="{{ Auth::user()->avatar_img_path }}" alt="">  -->
            </div>

            <ul class="list-unstyled components">
                <div class="text-center" style="background-color: #1EBD9E;"> 
                  <span class="span-teacher" >Giảng viên: </span> 
                   {{ Auth::user()->full_name }}
                </div>
                <li class="date-teach">
                  <a href="{{ route('get-class-subject-teacher-today') }}">Trang chủ</a>
                </li>
                <li class="date-teach">
                  <a href="{{ route('get-class-subjects-teacher') }}">Danh sách lớp dạy</a>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
              <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-default logout ml-5"> LOGOUT <i class="fas fa-sign-out-alt"></i> </button> 
                </form>
              </li>
            </ul>
        </nav>