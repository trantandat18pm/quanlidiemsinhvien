<link rel="stylesheet" href="<?php echo e(asset('public/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')); ?>">
	<link href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('public/css/fontawesome.min.css')); ?>" rel="stylesheet" />
<!-- 	<link href="<?php echo e(asset('public/css/custom.css')); ?>" rel="stylesheet" />
 -->    <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="<?php echo e(asset('public/js/popper.min.js')); ?>" defer></script>
	<script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
	a{
		color: black;
	}
	.row img{
		width: 100px;
		height: 100px;
		margin-bottom: 10px;
		
	}
	.card-body{
		text-align: center;

	}
	#row1{
		margin-bottom: 10px;
		
	}
	#card1{
		border-color: #3399ff;
		border-radius: 20px;
	}
</style>
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

				<ul class="navbar-nav ml-auto">
					<?php if(auth()->guard()->guest()): ?>
						<li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>"><i class="fal fa-sign-in-alt"></i> Đăng nhập</a></li>
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
	<div class="card">
		<div class="card-header text-center"><h2>Quản lí điểm sinh viên</h2></div>
		<div class="card-body">
			<?php if(session('status')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo e(session('status')); ?>

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

				</div>

			<?php endif; ?>
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
	
		<h1>Xin chào <?php echo e(Auth::user()->name); ?>  </h1>
		<?php endif; ?>
				<div>
					 <img src="img/daihoc.png" width="700px" class="xnxx">

				</div>
				<?php if(auth()->guard()->check()): ?>
				<a href="<?php echo e(url('/trangchu')); ?>" class="btn btn-primary">Chức năng</a>
				<?php endif; ?>
			
				
				
				 </div>
					 
				</div>
					
				
		</div>
	</div>

<?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/home.blade.php ENDPATH**/ ?>