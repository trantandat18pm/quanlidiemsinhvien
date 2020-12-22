

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Xóa khoa</div>
		<div class="card-body">
			<form action="<?php echo e(url('/thongtingiangday/xoa/' . $tt->id)); ?>" method="post">
				<?php echo csrf_field(); ?>
				<p>Bạn có muốn xóa thông tin giảng dạy của giảng viên <?php echo e($tt->ma_gv); ?> với môn học có mã <?php echo e($tt->ma_mh); ?> của lớp <?php echo e($tt->ma_lop); ?>  không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\Quan_Diem_SV - Loading\resources\views/thongtingiangday/xoa.blade.php ENDPATH**/ ?>