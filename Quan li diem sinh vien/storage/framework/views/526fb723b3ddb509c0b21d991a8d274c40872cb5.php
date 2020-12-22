<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />


	<title><?php echo e(config('app.name', 'Laravel')); ?></title>
	
	<!-- Scripts -->
	<!-- <script src="<?php echo e(asset('public/js/jquery-3.5.1.slim.min.js')); ?>" defer></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->

	<!-- <script src="http://code.jquery.com/jquery-3.4.1.js"></script> -->

	<script src="<?php echo e(asset('public/js/popper.min.js')); ?>" defer></script>
	<script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>" defer></script>
	
	  
	<?php echo $__env->yieldContent('javascript'); ?>
	
	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com" />
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
	
	<!-- Favicon -->
	<link href="<?php echo e(asset('public/images/logo.png')); ?>" rel="shortcut icon" type="image/x-icon" />
	
	<!-- Styles -->
	<link href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('public/css/fontawesome.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('public/css/custom.css')); ?>" rel="stylesheet" />
	
	<style type="text/css">
		a{
			margin: 5px;
			border-radius: 10px;
		}
		
	</style>
	
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<a class="navbar-brand" href="<?php echo e(url('/')); ?>">
				<img src="<?php echo e(asset('public/images/logo.png')); ?>" width="30" height="30" class="d-inline-block align-top" alt="" />
				<?php echo e(config('app.name', 'Laravel')); ?>

			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<?php if(auth()->guard()->check()): ?>
						<li class="nav-item"><a class="nav-link btn " href="<?php echo e(url('/lop')); ?>"><i class="fal fa-home"></i> Lớp</a></li>
						<li class="nav-item"><a class="nav-link btn " href="<?php echo e(url('/sinhvien')); ?>"><i class="fal fa-users"></i> Sinh viên</a></li>
						<li class="nav-item"><a class="nav-link btn" href="<?php echo e(url('/khoa')); ?>"><i class="fa fa-graduation-cap"></i>Khoa</a></li>
						<li class="nav-item"><a class="nav-link btn " href="<?php echo e(url('/monhoc')); ?>"><i class="	fa fa-book"></i> Môn học</a></li>
						<li class="nav-item"><a class="nav-link btn " href="<?php echo e(url('/diem')); ?>"><i class=  "fa fa-id-badge"></i>Điểm</a></li>
						<li class="nav-item"><a class="nav-link btn " href="<?php echo e(url('/giangvien')); ?>"><i class="fas fa-chalkboard-teacher"></i>Giảng Viên</a></li>

					<?php endif; ?>
				</ul>
				<ul class="navbar-nav ml-auto">
					<?php if(auth()->guard()->guest()): ?>
						<li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>"><i class="fal fa-sign-in-alt"></i> Đăng nhập</a></li>
						<?php if(Route::has('register')): ?>
							<li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>"><i class="fal fa-user-plus"></i> Đăng ký</a></li>
						<?php endif; ?>
					<?php else: ?>
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fal fa-user-circle"></i> <?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fal fa-sign-out"></i> Đăng xuất</a>
								<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" style="display: none;"><?php echo csrf_field(); ?></form>
							</div>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>
		
		<main class="pt-2">
			<?php echo $__env->yieldContent('content'); ?>
		</main>
		
		<hr class="shadow-sm" />
		<footer align="center">Bản quyền &copy; <?php echo e(date('Y')); ?> bởi <?php echo e(config('', 'Trần Tấn Đạt')); ?>.
			
	


		</footer>
	</div>
</body>
</html><?php /**PATH E:\wamp\www\Quan_Diem_SV - Loading\resources\views/layouts/app.blade.php ENDPATH**/ ?>