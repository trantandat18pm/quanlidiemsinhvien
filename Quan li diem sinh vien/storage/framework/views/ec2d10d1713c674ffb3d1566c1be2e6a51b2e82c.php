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
<div class="container">
  <div class="row justify-content-center">
<!--      <img src="https://www.agu.edu.vn/themes/custom/versh/logo_vi.png">
 -->    <div class="col-md-6">

      <div class="card">
        <div class="card-header text-center"><h3><?php echo e(__('Đăng Nhập')); ?></h3></div>

        <div class="card-body">
          <form method="post" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for="email"><?php echo e(__('Tài khoản')); ?></label>
              <input type="text" class="form-control<?php echo e(($errors->has('email') || $errors->has('username')) ? ' is-invalid' : ''); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email address or Username" required />
              <?php if($errors->has('email') || $errors->has('username')): ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e(empty($errors->first('email')) ? $errors->first('username') : $errors->first('email')); ?></strong></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="password"><?php echo e(__('Mật khẩu')); ?></label>
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
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> />
                <label class="custom-control-label" for="remember"><?php echo e(__('Remember me')); ?></label>
              </div>
            </div>
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary"><i class="fal fa-sign-in-alt"></i> <?php echo e(__('Login')); ?></button>
              <?php if(Route::has('password.request')): ?>
                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot your password?')); ?></a>
              <?php endif; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/auth/login.blade.php ENDPATH**/ ?>