

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Xóa giảng viên</div>
		<div class="card-body">
			<form action="<?php echo e(url('/giangvien/xoa/' . $giangvien->id)); ?>" method="post">
				<?php echo csrf_field(); ?>
				<p>Bạn có muốn xóa lớp <?php echo e($giangvien->tengv); ?> không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\Quan_Diem_SV - Loading\resources\views/giangvien/xoa.blade.php ENDPATH**/ ?>