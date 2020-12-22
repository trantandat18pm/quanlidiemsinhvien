

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header text-center"><h2>Giảng viên</h2></div>
		<div class="card-body">
			<p><a href="<?php echo e(url('/giangvien/them')); ?>" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">#</th>
						<th class="w-10">Mã giảng viên</th>
						<th>Tên giảng viên</th>
						<th>Khoa</th>
						
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>

					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $giangvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->magv); ?></td>
							<td><?php echo e($value->tengv); ?></td>
							
						<?php $__currentLoopData = $khoa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($value->khoa_id == $k->makhoa): ?>
								<td><?php echo e($k->tenkhoa); ?></td>
							
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<td class="text-center"><a href="<?php echo e(url('/giangvien/sua/' . $value->id)); ?>"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/giangvien/xoa/' . $value->id)); ?>"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
				
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/giangvien/danhsach.blade.php ENDPATH**/ ?>