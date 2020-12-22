

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header text-center"><h2>Môn Học</h2></div>
		<div class="card-body">
			<p><a href="<?php echo e(url('/monhoc/them')); ?>" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">#</th>
						<th class="w-10">Mã Môn học</th>
						<th>Tên môn học</th>
						<th class="w-5">Ngày tạo</th>
						<th class="w-5">Ngày sửa</th>
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $mon_hoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->id); ?></td>
							<td><?php echo e($value->tenmh); ?></td>
							<td><?php echo e($value->created_at); ?></td>
							<td><?php echo e($value->updated_at); ?></td>
							<td class="text-center"><a href="<?php echo e(url('/monhoc/sua/' . $value->id)); ?>"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/monhoc/xoa/' . $value->id)); ?>"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\Quan_Diem_SV\resources\views/monhoc/danhsach.blade.php ENDPATH**/ ?>