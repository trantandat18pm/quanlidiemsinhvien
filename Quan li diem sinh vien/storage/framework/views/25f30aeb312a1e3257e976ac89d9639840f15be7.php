

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Sửa môn học</div>
		<div class="card-body">
			<form action="<?php echo e(url('/monhoc/sua/' . $mon_hoc->id)); ?>" method="post">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="mamon">Mã môn học</label>
					<input type="text" class="form-control <?php $__errorArgs = ['id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="mamon" name="mamon" value="<?php echo e($mon_hoc->mamon); ?>" />
					<?php $__errorArgs = ['mamon'];
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
					<label for="tenmh">Tên môn học</label>
					<input type="text" class="form-control <?php $__errorArgs = ['tenmh'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tenmh" name="tenmh" value="<?php echo e($mon_hoc->tenmh); ?>" />
					<?php $__errorArgs = ['tenmh'];
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
					<label for="phan_tram_thi">Số tín chỉ</label>
					<select class="form-control <?php $__errorArgs = ['sotc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sotc" name="sotc">
						<option value="">--Chọn--</option>					
	
						<?php for($i=1;$i<=10;$i++): ?>
						<?php if($mon_hoc->sotc==$i): ?>{
					<option value="<?php echo e($i); ?>" selected><?php echo e($i); ?></option>
					}
						<?php else: ?>
							<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
						
						<?php endif; ?>
						$i++;	
						<?php endfor; ?>						
					</select>
					<?php $__errorArgs = ['sotc'];
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
					<label for="hocki">Học kì</label>
					<select class="form-control <?php $__errorArgs = ['sotc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="hocki" name="hocki">
						<option value="">--Chọn--</option>
					
	
						<?php for($i=1;$i<=10;$i++): ?>
						<?php if($mon_hoc->hocki==$i): ?>{
					<option value="<?php echo e($i); ?>" selected><?php echo e($i); ?></option>
					}
						<?php else: ?>
							<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
						
						<?php endif; ?>
						$i++;	
						<?php endfor; ?>						
					</select>
					<?php $__errorArgs = ['hocki'];
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
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/monhoc/sua.blade.php ENDPATH**/ ?>