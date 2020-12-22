

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Thêm điểm</div>
		<div class="card-body">
			<form action="<?php echo e(url('/diem/them')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="malop">Lớp</label>
					<select class="form-control <?php $__errorArgs = ['malop'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="malop" name="malop">
						<option value="">-- Chọn lớp --</option>						
						<?php $__currentLoopData = $malop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->ma_lop); ?>"><?php echo e($value->ma_lop); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<?php $__errorArgs = ['malop'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="masv">Mã sinh viên</label>
					<select class="form-control <?php $__errorArgs = ['masv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="masv" name="masv">
						<option value="">-- Chọn mã sinh viên --</option>						
					
					</select>
					<?php $__errorArgs = ['masv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				
				<div class="form-group">
					<label for="maMH_id">Mã môn học</label>
					<select class="form-control <?php $__errorArgs = ['maMH_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="maMH_id" name="maMH_id">
						<option value="">-- Chọn mã môn học --</option>
						
					</select>
					<?php $__errorArgs = ['khoa_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="diemTX">Điểm thường xuyên</label>
					<input type="text" class="form-control <?php $__errorArgs = ['diemTX'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diemTX" name="diemTX" />
					<?php $__errorArgs = ['diemTX'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
					<div class="form-group">
					<label for="diemthil1">Điểm thi lần 1</label>
					<input type="text" class="form-control <?php $__errorArgs = ['diemthil1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diemthil1" name="diemthil1" />
					<?php $__errorArgs = ['diemthil1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				
					<div class="form-group">
					<label for="diemthil2">Điểm thi lần 2</label>
					<input type="text" class="form-control <?php $__errorArgs = ['diemthil2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diemthil2" name="diemthil2" />
					<?php $__errorArgs = ['diemthil2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				
					
		        
		<script>
					$(document).ready(function () {
					$('#malop').on('change', function () {
				
					let lop_id = $(this).val();
					$('#masv').empty();
					$('#masv').append(`<option value="0" disabled selected>Processing...</option>`);
					$.get("<?php echo e(route('ajax')); ?>", {lop_id:lop_id}, function(data){
						console.log(data)
						$('#masv').empty();
						$('#masv').html(data);
					})
					// phien ban jquery cua e bi sai nhe mo cay thu muc ra xem nao
					//em co test bên khác thì được a k hiểu sau lun
				// 	$.ajax({
				// 	type: 'GET',
				// 	url: '/diem/them/timSV/'+ lop_id,
				// 	success: function (response) {
				// 	var response = JSON.parse(response);
				// 	console.log(response);   
				// 	$('#masv').empty();
				// 	$('#masv').append(`<option value="0" disabled selected>Select Sub Category*</option>`);
				// 	response.forEach(element => {
				// 		$('#masv').append(`<option value="${element['masv']}">${element['tensv']}</option>`);
				// 		});
				// 	}
				// });
			});
		});
		</script>
			<script>
					$(document).ready(function () {
					$('#malop').on('change', function () {
				
					let lop_id = $(this).val();
					$('#maMH_id').empty();
					$('#maMH_id').append(`<option value="0" disabled selected>Processing...</option>`);
					$.get("<?php echo e(route('ajax1')); ?>", {lop_id:lop_id}, function(data){
						console.log(data)
						$('#maMH_id').empty();
						$('#maMH_id').html(data);
					})
					
			});
		});
		</script>
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\Quan_Diem_SV - Loading\resources\views/diem/them.blade.php ENDPATH**/ ?>