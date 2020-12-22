

<?php $__env->startSection('content'); ?>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo e($SLSV); ?></h3>

                <p>Sinh Viên</p>
              </div>
              <div class="icon">
               <!--  <i class="ion ion-accessibility"></i> -->
                <span class="iconify " data-icon="ion:accessibility" data-inline="false"></span>
              </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>   <a href="<?php echo e(url('/sinhvien')); ?>" class="small-box-footer">Chi tiết  <i class="fas fa-arrow-circle-right"></i></a><?php endif; ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo e($SLGV); ?></h3>

                <p>Giảng Viên</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-stats-bars"></i> -->
             <span class="iconify" data-icon="ion:briefcase-sharp" data-inline="false"></span>
              </div>
           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>    <a href="<?php echo e(url('/giangvien')); ?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a><?php endif; ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo e($SLK); ?></h3>

                <p>Khoa</p>
              </div>
              <div class="icon">
               <!--  <i class="ion ion-person-add"></i> -->
               <span class="iconify" data-icon="ion:library" data-inline="false"></span>
              </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>  <a href="<?php echo e(url('/khoa')); ?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a><?php endif; ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo e($SLL); ?></h3>

                <p>Lớp</p>
              </div>
              <div class="icon">
              <!--   <i class="ion ion-pie-graph"></i> -->
              <span class="iconify" data-icon="ion:book-sharp" data-inline="false"></span>
              </div>
           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>    <a href="<?php echo e(url('/lop')); ?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a><?php endif; ?>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/homedemo.blade.php ENDPATH**/ ?>