

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header text-center"> <h2> Danh sách sinh viên lớp <?php echo e($malop[0]->lop_id); ?> </h2>
		<h3><?php echo e($tenlop[0]->tenlop); ?></h3>
		</div>
		<div class="card-body">
			<p>
				<!-- <a href="<?php echo e(url('/sinhvien/them')); ?>" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a>
				<a href="#nhap" class="btn btn-success" data-toggle="modal" data-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
				<a href="<?php echo e(url('/sinhvien/xuat')); ?>" class="btn btn-info"><i class="fal fa-download"></i> Xuất ra Excel</a> -->
				

			</p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>MSSV</th>
						<th>Họ và tên</th>
						
						<th>Lớp</th>
						
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->masv); ?></td>
							<td><?php echo e($value->hoten); ?></td>
							
							<td><?php echo e($value->lop_id); ?></td>
							<!-- <td class="text-center"><a href="<?php echo e(url('/sinhvien/sua/' . $value->masv)); ?>"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/sinhvien/xoa/' . $value->masv)); ?>"><i class="fal fa-trash-alt text-danger"></i></a></td> -->
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>	
        

	<form action="<?php echo e(url('/sinhvien/nhap')); ?>" method="post" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Chọn tập tin Excel</label>
							<input type="file" class="form-control-file" id="TapTinExcel" name="TapTinExcel" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
						<button type="submit" class="btn btn-primary">Nhập dữ liệu</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/thongtin/danhsachSV.blade.php ENDPATH**/ ?>