

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header text-center"><h2>NGƯỜI DÙNG</h2></div>
		<div class="card-body">
		<!-- 	<p><a href="<?php echo e(url('/lop/them')); ?>" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p> -->
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">#</th>
						<th class="w-10">Họ tên</th>
						<th>Username</th>
						<th>Quyền hạn</th>
						<th>Hình Ảnh</th>
						<th class="w-5">Sửa</th>
						

					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $nguoidung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->name); ?></td>
							<td><?php echo e($value->username); ?></td>
							<td >
							<?php if($value->quyenhan==1): ?>
								Admin
							<?php elseif($value->quyenhan==2): ?>
									Giảng viên
							<?php elseif($value->quyenhan==3): ?>
									Sinh viên		
							<?php endif; ?>
							</td>
							<td>
								<?php if(($value->hinhanh)==""): ?>
								<img src="<?php echo e(asset('public/images/defaut.png')); ?>" class="brand-image img-circle elevation-3" style="width: 50px;height: 50px;">
								<?php else: ?>							
								<img src="<?php echo e($value->hinhanh); ?>" class="brand-image img-circle elevation-3" style="width: 50px;height: 50px;">
								<?php endif; ?>
							</td>
							<td class="text-center"><a href="<?php echo e(url('/nguoidung/sua/' . $value->id)); ?>"><i class="fal fa-edit"></i></a></td>
						
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/nguoidung/danhsach.blade.php ENDPATH**/ ?>