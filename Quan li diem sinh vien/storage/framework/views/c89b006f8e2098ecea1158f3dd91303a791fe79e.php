

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Xóa môn học</div>
		<div class="card-body">
			<form action="<?php echo e(url('/monhoc/xoa/' . $mon_hoc->id)); ?>" method="post">
				<?php echo csrf_field(); ?>
				<p>Bạn có muốn xóa môn học <?php echo e($mon_hoc->tenkhoa); ?> không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\Quan_Diem_SV - Loading\resources\views/monhoc/xoa.blade.php ENDPATH**/ ?>