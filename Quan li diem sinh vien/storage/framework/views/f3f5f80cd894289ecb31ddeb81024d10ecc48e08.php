<?php $__env->startSection('content'); ?>
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
	<div class="card">
		<div class="card-header text-center"><h2>Trang chủ</h2></div>
		<div class="card-body">
			<?php if(session('status')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo e(session('status')); ?>

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

				</div>

			<?php endif; ?>
		<p>	<h4>TRANG WEB QUẢN LÍ ĐIỂM SINH VIÊN</h4></p>
				<div>
					 <img src="/./daihoc.png" width="700px" class="xnxx">

				</div>
			
					<?php if(auth()->guard()->check()): ?>
					<style type="text/css">
						.xnxx{
							display: none;
						}

					</style>
				<div class="row" id="row1">
					  <div class="col-sm-6">
					    <div class="card" id="card1">
					      <div class="card-body">
					      	 <img src="/./student.png" alt="...">
					      	
					        <h5 class="card-title">QUẢN LÍ SINH VIÊN</h5>
					        <p class="card-text">Quản lí thông tin cá nhân của từng sinh viên.</p>
					        <a href="<?php echo e(url('/sinhvien')); ?>" class="btn btn-primary">
							 Đi nào!-->
							  
					        </a>

					      </div>
					    </div>
					  </div>
					  <div class="col-sm-6">
					    <div class="card" id="card1">
					      <div class="card-body">
					      	 <img src="/./register.png" alt="...">
					        <h5 class="card-title">QUẢN LÍ ĐIỂM</h5>
					        <p class="card-text">Quản lí thông tin điểm của sinh viên.</p>
					         <a href="<?php echo e(url('/diem')); ?>" class="btn btn-primary">
							 Đi nào!-->
							  
					        </a>
					      </div>
					    </div>
					  </div>
					</div>
					<div class="row" id="row1">
					  <div class="col-sm-6">
					    <div class="card" id="card1">
					      <div class="card-body">
					      	 <img src="/./faculty.png" alt="...">
					        <h5 class="card-title">QUẢN LÍ KHOA</h5>
					        <p class="card-text">Quản lí thông tin của từng khoa.</p>
					         <a href="<?php echo e(url('/khoa')); ?>" class="btn btn-primary">
							 Đi nào!-->
							  
					        </a>
					      </div>
					    </div>
					  </div>
					  <div class="col-sm-6">
					    <div class="card" id="card1">
					      <div class="card-body">
					      	 <img src="/./class.png" alt="...">
					        <h5 class="card-title">QUẢN LÍ LỚP</h5>
					        <p class="card-text">Quản lí thông tin của từng lớp.</p>
					        <a href="<?php echo e(url('/lop')); ?>" class="btn btn-primary">
							 Đi nào!-->
							  
					        </a>
					      </div>
					    </div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-6">
					    <div class="card" id="card1">
					      <div class="card-body">
					      	 <img src="/./book.png" alt="...">
					        <h5 class="card-title">QUẢN LÍ MÔN HỌC</h5>
					        <p class="card-text">Quản lí thông tin của từng môn học.</p>
					        <a href="<?php echo e(url('/monhoc')); ?>" class="btn btn-primary">
							 Đi nào!-->
							  
					        </a>
					      </div>
					    </div>
					  </div>
					</div>
					 </div>
					 
				</div>
					<?php endif; ?>
				
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\qlsv_v4.0\qlsv_v4.0\resources\views/home.blade.php ENDPATH**/ ?>