<?php $__env->startSection('pagetitle'); ?>
	Reset password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header"><?php echo e(__('Reset password')); ?></div>
				<div class="card-body">
					<form method="post" action="<?php echo e(route('password.update')); ?>">
						<?php echo csrf_field(); ?>
						<input type="hidden" name="token" value="<?php echo e($token); ?>" />
						<div class="form-group">
							<label for="email"><?php echo e(__('E-Mail address')); ?></label>
							<input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e($email ?? old('email')); ?>" required />
							<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>
						<div class="form-group">
							<label for="password"><?php echo e(__('Password')); ?></label>
							<input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" required />
							<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>
						<div class="form-group">
							<label for="password-confirm"><?php echo e(__('Confirm password')); ?></label>
							<input type="password" class="form-control" id="password-confirm" name="password_confirmation" required />
							<?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>
						<div class="form-group mb-0">
							<button type="submit" class="btn btn-primary"><i class="fal fa-exchange-alt"></i> <?php echo e(__('Reset password')); ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\wamp\www\qlsv_v3.0\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>