

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="card">
		<div class="card-header text-center">Thêm Thông Tin Giảng Dạy</div>
		<div class="card-body">
			<form action="<?php echo e(url('/thongtingiangday/them')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="makhoa">Khoa</label>
					<select class="form-control <?php $__errorArgs = ['makhoa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="makhoa" name="makhoa">
						<option value="">-- Chọn khoa --</option>
						<?php $__currentLoopData = $khoa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->makhoa); ?>"><?php echo e($value->tenkhoa); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<?php $__errorArgs = ['makhoa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="monhoc">Môn học</label>
					<select class="form-control <?php $__errorArgs = ['monhoc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="monhoc" name="monhoc">
						<option value="">-- Chọn môn --</option>
						<?php $__currentLoopData = $monhoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->mamon); ?>"><?php echo e($value->tenmh); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<?php $__errorArgs = ['monhoc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="magv">Giảng Viên</label>
					<select class="form-control <?php $__errorArgs = ['magv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="magv" name="magv">
						<option value="">-- Chọn giảng viên --</option>
						<?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->magv); ?>"><?php echo e($value->tengv); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<?php $__errorArgs = ['magv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="malop">Lớp</label>
					<select class="form-control formselect required <?php $__errorArgs = ['malop'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="malop" name="malop">
					<option value="">-- Chọn lớp --</option>
						<?php $__currentLoopData = $lop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->malop); ?>"><?php echo e($value->tenlop); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<?php $__errorArgs = ['malop'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="flash-message">
				<?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(Session::has('alert-' . $msg)): ?>
					<p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					<?php endif; ?>
 			   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>

			
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
	</script>
			<script>
					$(document).ready(function () {
					$('#makhoa').on('change', function () {
				
					let khoa_id = $(this).val();
					$('#magv').empty();
					$('#magv').append(`<option value="0" disabled selected>Processing...</option>`);
					$.get("<?php echo e(route('ajaxGV')); ?>", {khoa_id:khoa_id}, function(data){
						console.log(data)
						$('#magv').empty();
						$('#magv').html(data);
					})
					
			});
		});
		</script>
		</script>
			<script>
					$(document).ready(function () {
					$('#makhoa').on('change', function () {
				
					let khoa_id = $(this).val();
					$('#malop').empty();
					$('#malop').append(`<option value="0" disabled selected>Processing...</option>`);
					$.get("<?php echo e(route('ajaxLop')); ?>", {khoa_id:khoa_id}, function(data){
						console.log(data)
						$('#malop').empty();
						$('#malop').html(data);
					})
					
			});
		});
		</script>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/thongtingiangday/them.blade.php ENDPATH**/ ?>