<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

 
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')); ?>">
	<link href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('public/css/fontawesome.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('public/css/custom.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">

    <script src="<?php echo e(asset('public/js/popper.min.js')); ?>" defer></script>
	<script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>" defer></script>
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
        <h5><a href="<?php echo e(url('/trangchu')); ?>" class="nav-link">QUẢN LÍ ĐIỂM SINH VIÊN</a></h5>
      </li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<?php if(auth()->guard()->guest()): ?>
						<li class="nav-item"><a class="nav-link active" href="<?php echo e(route('login')); ?>"><i class="fal fa-sign-in-alt"></i> Đăng nhập</a></li>
						<?php if(Route::has('register')): ?>
							<li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>"><i class="fal fa-user-plus"></i> Đăng ký</a></li>
						<?php endif; ?>
					<?php else: ?>
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fal fa-user-circle"></i>  <span class="caret"></span></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fal fa-sign-out"></i> Đăng xuất</a>
                <a class="dropdown-item" href=""data-target="#thongtintaikhoan" data-toggle="modal" ><i class="fal fa-sign-out"></i>Thông tin</a>
								<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" style="display: none;"><?php echo csrf_field(); ?></form>
               
							</div>
						</li>
					<?php endif; ?>
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
    <a href="<?php echo e(url('/trangchu')); ?>" class="brand-link">
      <img src="<?php echo e(asset('img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
        <?php if(auth()->guard()->check()): ?>
        <?php if( (Auth::user()->quyenhan)==1 ): ?>
          Administrator
         <?php elseif( (Auth::user()->quyenhan)==2 ): ?>
         Giảng Viên
          <?php elseif( (Auth::user()->quyenhan)==3): ?>
         Sinh Viên
         <?php endif; ?>  
        <?php endif; ?>
      
      
       <?php if(auth()->guard()->guest()): ?>
          alo
      <?php endif; ?>    
        
      </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if(auth()->guard()->check()): ?>
          <?php if((Auth::user()->hinhanh)==""): ?>
          <a data-target="#thongtintaikhoan" data-toggle="modal"><img src="<?php echo e(asset('public/images/defaut.png')); ?>" class="img-circle elevation-2" alt="User Image"></a>
        
        <?php else: ?>
          <a data-target="#thongtintaikhoan" data-toggle="modal"><img src="<?php echo e(asset( Auth::user()->hinhanh)); ?>" class="img-circle elevation-2" alt="User Image"></a>
          <?php endif; ?>
          <?php endif; ?>
        </div>
        <div class="info">
          <a href="#" class="d-block" data-target="#thongtintaikhoan" data-toggle="modal">
            
              <?php if(auth()->guard()->check()): ?>
              <?php echo e(Auth::user()->name); ?> 
              <?php endif; ?>
      
      
       <?php if(auth()->guard()->guest()): ?>
          
      <?php endif; ?> 
             
           
      
          
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     
           
         <!-- Sidebar Menu -->
          
      <nav class="mt-2">


        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library --> 
<?php if(auth()->guard()->check()): ?>
<li class="nav-item">
            <a href="<?php echo e(url('/trangchu')); ?>" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Trang chủ
               
              </p>
            </a>
          </li> 
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('giangvien')): ?> 
       

             <li class="nav-item">
            <a href="<?php echo e(url('/diem')); ?>" class="nav-link">
              <i class="nav-icon fas fa-pencil"></i>
              <p>
                Điểm
               
              </p>
            </a>
          </li> 
          <?php endif; ?> 
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
            <li class="nav-item">
            <a href="<?php echo e(url('/nguoidung')); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Người dùng
               
              </p>
            </a>
          </li> 
 
          <li class="nav-item">
            <a href="<?php echo e(url('/sinhvien')); ?>" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Sinh viên
               
              </p>
            </a>
          </li>  
          
        
          <li class="nav-item">
            <a href="<?php echo e(url('/giangvien')); ?>" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Giảng viên
               
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="<?php echo e(url('/khoa')); ?>" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
              Khoa
             <!--    <span class="right badge badge-primary">New</span> -->
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="<?php echo e(url('/lop')); ?>" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Lớp
               
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="<?php echo e(url('/monhoc')); ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Môn học
               
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="<?php echo e(url('/thongtingiangday')); ?>" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Thông tin giảng dạy
               
              </p>
            </a>
          </li>     
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sinhvien')): ?>
           <!-- <li class="nav-item">
            <a href="<?php echo e(url('/danhsachlop')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh sách lớp
               
              </p>
            </a>
          </li> --> 
           <li class="nav-item">
            <a href="<?php echo e(url('/danhsachdiem')); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Danh sách điểm
               
              </p>
            </a>
          </li> 
          <?php endif; ?>            
        </ul>
        <?php endif; ?>
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
      
        <?php echo $__env->yieldContent('content'); ?>
     
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
<?php if(auth()->guard()->check()): ?>
<form action="" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
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
             <h4><?php echo e(Auth::user()->name); ?></h4>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Username:</label>
             <h4><?php echo e(Auth::user()->username); ?></h4>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Quyền hạn:</label>
             <h4>
               <?php if( (Auth::user()->quyenhan)==1 ): ?>
          Administrator
         <?php elseif( (Auth::user()->quyenhan)==2 ): ?>
         Giảng Viên
          <?php elseif( (Auth::user()->quyenhan)==3): ?>
         Sinh Viên
         <?php endif; ?>  
        
            </h4>
            </div>
              <div class="form-group">
              <label for="recipient-name" class="col-form-label">Hình ảnh:</label>
             <img src="<?php echo e(asset(Auth::user()->hinhanh)); ?>" class="brand-image img-circle elevation-3" style="width: 150px;height: 150px;">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        
            <a href="<?php echo e(url('/nguoidung/sua/' . Auth::user()->id)); ?>" class="btn btn-primary">Cập nhật thông tin</a>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php endif; ?>
</body>
</html>
<?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/layouts/app.blade.php ENDPATH**/ ?>