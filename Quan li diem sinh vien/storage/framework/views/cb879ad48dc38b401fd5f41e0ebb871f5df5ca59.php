

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Xóa điểm</div>
		<div class="card-body">
			<form action="<?php echo e(url('/diem/xoa/' . $diem->MaSV_id.'/'.$diem->maMH_id)); ?>" method="post">
				<?php echo csrf_field(); ?>
				<p>Bạn có muốn xóa diem <?php echo e($diem->MaSV_id); ?> không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\Quan_Diem_SV\resources\views/diem/xoa.blade.php ENDPATH**/ ?>