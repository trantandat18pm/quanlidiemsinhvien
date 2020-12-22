<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

 
    <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
	<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('public/css/fontawesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('public/css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <script src="{{ asset('public/js/popper.min.js') }}" defer></script>
	<script src="{{ asset('public/js/bootstrap.min.js') }}" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script>
$(document).ready(function(){
  $(".nav-link").click(function(){
    $(this).addClass("active");
  });
});
</script> 
 </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
  	 <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
					<li class="">
        <h5><a href="{{ url('/trangchu') }}" class="nav-link">QUẢN LÍ ĐIỂM SINH VIÊN</a></h5>
      </li>
				</ul>
				<ul class="navbar-nav ml-auto">
					@guest
						<li class="nav-item"><a class="nav-link active" href="{{ route('login') }}"><i class="fal fa-sign-in-alt"></i> Đăng nhập</a></li>
						@if (Route::has('register'))
							<li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fal fa-user-plus"></i> Đăng ký</a></li>
						@endif
					@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fal fa-user-circle"></i>  <span class="caret"></span></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fal fa-sign-out"></i> Đăng xuất</a>
                <a class="dropdown-item" href=""data-target="#thongtintaikhoan" data-toggle="modal" ><i class="fal fa-sign-out"></i>Thông tin</a>
								<form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">@csrf</form>
               
							</div>
						</li>
					@endguest
				</ul>

    <!-- SEARCH FORM -->
   </div>
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- bên trái -->
   
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/trangchu') }}" class="brand-link">
      <img src="{{ asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
        @auth
        @if( (Auth::user()->quyenhan)==1 )
          Administrator
         @elseif( (Auth::user()->quyenhan)==2 )
         Giảng Viên
          @elseif( (Auth::user()->quyenhan)==3)
         Sinh Viên
         @endif  
        @endauth
      
      
       @guest
          alo
      @endguest    
        
      </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @auth
          @if((Auth::user()->hinhanh)=="")
          <a data-target="#thongtintaikhoan" data-toggle="modal"><img src="{{ asset('public/images/defaut.png')}}" class="img-circle elevation-2" alt="User Image"></a>
        
        @else
          <a data-target="#thongtintaikhoan" data-toggle="modal"><img src="{{ asset( Auth::user()->hinhanh)}}" class="img-circle elevation-2" alt="User Image"></a>
          @endif
          @endauth
        </div>
        <div class="info">
          <a href="#" class="d-block" data-target="#thongtintaikhoan" data-toggle="modal">
            
              @auth
              {{Auth::user()->name}} 
              @endauth
      
      
       @guest
          
      @endguest 
             
           
      
          
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     
           
         <!-- Sidebar Menu -->
          
      <nav class="mt-2">


        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library --> 
@auth
<li class="nav-item">
            <a href="{{ url('/trangchu') }}" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Trang chủ
               
              </p>
            </a>
          </li> 
  @can('giangvien') 
       

             <li class="nav-item">
            <a href="{{ url('/diem') }}" class="nav-link">
              <i class="nav-icon fas fa-pencil"></i>
              <p>
                Điểm
               
              </p>
            </a>
          </li> 
          @endcan 
          @can('admin')
            <li class="nav-item">
            <a href="{{ url('/nguoidung') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Người dùng
               
              </p>
            </a>
          </li> 
 
          <li class="nav-item">
            <a href="{{ url('/sinhvien') }}" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Sinh viên
               
              </p>
            </a>
          </li>  
          
        
          <li class="nav-item">
            <a href="{{ url('/giangvien') }}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Giảng viên
               
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{ url('/khoa') }}" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
              Khoa
             <!--    <span class="right badge badge-primary">New</span> -->
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{ url('/lop') }}" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Lớp
               
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="{{ url('/monhoc') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Môn học
               
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="{{ url('/thongtingiangday') }}" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Thông tin giảng dạy
               
              </p>
            </a>
          </li>     
        @endcan
        @can('sinhvien')
           <!-- <li class="nav-item">
            <a href="{{ url('/danhsachlop') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh sách lớp
               
              </p>
            </a>
          </li> --> 
           <li class="nav-item">
            <a href="{{ url('/danhsachdiem') }}" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Danh sách điểm
               
              </p>
            </a>
          </li> 
          @endcan            
        </ul>
        @endauth
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 
<!-- Bên trái -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        @yield('content')
     
      </div><!-- /.container-fluid -->
    </section>
  
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2020 <a href="https://www.facebook.com/tandat18pm/">Trần Tấn Đạt </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.6.9-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery  mấy cái chuyển động-->
<script src="public/plugins/jquery/jquery.min.js"></script>

<script src="public/dist/js/adminlte.js"></script>
@auth
<form action="" method="post" enctype="multipart/form-data">
    @csrf
        <div class="modal fade" id="thongtintaikhoan" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="importModalLabel">Thông tin tài khoản</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Họ Tên:</label>
             <h4>{{Auth::user()->name}}</h4>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Username:</label>
             <h4>{{Auth::user()->username}}</h4>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Quyền hạn:</label>
             <h4>
               @if( (Auth::user()->quyenhan)==1 )
          Administrator
         @elseif( (Auth::user()->quyenhan)==2 )
         Giảng Viên
          @elseif( (Auth::user()->quyenhan)==3)
         Sinh Viên
         @endif  
        
            </h4>
            </div>
              <div class="form-group">
              <label for="recipient-name" class="col-form-label">Hình ảnh:</label>
             <img src="{{ asset(Auth::user()->hinhanh) }}" class="brand-image img-circle elevation-3" style="width: 150px;height: 150px;">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        
            <a href="{{ url('/nguoidung/sua/' . Auth::user()->id) }}" class="btn btn-primary">Cập nhật thông tin</a>
          </div>
        </div>
      </div>
    </div>
  </form>
  @endauth
</body>
</html>
