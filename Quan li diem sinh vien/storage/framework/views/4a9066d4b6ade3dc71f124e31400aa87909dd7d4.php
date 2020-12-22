

<?php $__env->startSection('content'); ?>
		<div class="card">
		<div class="card-header"><h3 class="text-center">Cập nhật thông tin tài khoản</h3></div>
		<div class="card-body">
			<form action="<?php echo e(url('/nguoidung/sua/' . $nd->id)); ?>" method="post" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="malop">Tên người dùng</label>
					<input type="text" class="form-control <?php $__errorArgs = ['id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="malop" name="malop" value="<?php echo e($nd->name); ?>" />
					<?php $__errorArgs = ['id'];
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
				    <label for="hinhanh">Hình ảnh</label>
				   <img src="<?php echo e(asset($nd->hinhanh)); ?>" class="brand-image img-circle elevation-3" style="width: 150px;height: 150px;">
				  </div>
				
				  <div class="form-group">
				    <label for="hinhanh">Hình ảnh</label>
				    <input type="file" class="form-control-file" id="hinhanh" name="hinhanh">
				  </div>

				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/nguoidung/sua.blade.php ENDPATH**/ ?>