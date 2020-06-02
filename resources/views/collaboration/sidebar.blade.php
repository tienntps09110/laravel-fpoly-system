<nav id="sidebar">
	<div class="sidebar-header">
		<div class="avatar"></div>
	</div>

	<ul class="list-unstyled components">
		<p class="text-center" style="background-color: #1EBD9E;">Hữu lợi.info</p>
		<li class="active">
			<a href="#">Nhập thông tin <span style="float: left;"><i class="fas fa-user-plus"></i></span>
			</a>
		</li>
		<li>
			<a href="#">Phân lớp <span style="float: left;"><i class="fas fa-divide"></i></span>
			</a>
		</li>
		<li>
			<a href="#">Danh sách <span style="float: left;"><i class="fas fa-list"></i></span> </a>
		</li>
		<li>
			<a href="#">Tổng quát</a>
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