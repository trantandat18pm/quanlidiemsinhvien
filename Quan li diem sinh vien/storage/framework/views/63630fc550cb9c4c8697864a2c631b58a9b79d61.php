

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header text-center"><h2>Thông Tin Giảng Dạy</h2></div>
		<div class="card-body">
			<p><a href="<?php echo e(url('/thongtingiangday/them')); ?>" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<div class="flash-message">
				<?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(Session::has('alert-' . $msg)): ?>
					<p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					<?php endif; ?>
 			   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">#</th>
						<th class="w-10">Mã Giảng Viên</th>
						<th>Mã môn học</th>
						<th>Mã lớp</th>
						<th class="w-5">Ngày tạo</th>
						<th class="w-5">Ngày sửa</th>
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $tt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>					
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->ma_gv); ?></td>
							<td><?php echo e($value->ma_mh); ?></td>
							<td><?php echo e($value->ma_lop); ?></td>
							<td><?php echo e($value->created_at); ?></td>
							<td><?php echo e($value->updated_at); ?></td>
							<td class="text-center"><a href="<?php echo e(url('/thongtingiangday/sua/' . $value->id)); ?>"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/thongtingiangday/xoa/' . $value->id)); ?>"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\Quan_Diem_SV - Loading\resources\views/thongtingiangday/danhsach.blade.php ENDPATH**/ ?>