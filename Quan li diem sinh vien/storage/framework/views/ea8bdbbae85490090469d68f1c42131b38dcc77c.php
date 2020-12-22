

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header"><h4>Cập nhật điểm</h4></div>
		<div class="flash-message">
				<?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(Session::has('alert-' . $msg)): ?>
					<p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					<?php endif; ?>
 			   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
		<div class="card-body">
			<form action="<?php echo e(url('/diem/sua/' . $diem->MaSV_id.'/'.$diem->maMH_id)); ?>" method="post">
				<?php echo csrf_field(); ?>				
				
				<div class="form-group">
					<label for="MaSV_id"> Mã Sinh Viên</label>
					<input type="text" class="form-control <?php $__errorArgs = ['MaSV_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MaSV_id" name="MaSV_id" value="<?php echo e($diem->MaSV_id); ?>" />
					<?php $__errorArgs = ['tenlop'];
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
					<label for="maMH_id"> Mã Môn Học</label>
					<input type="text" class="form-control <?php $__errorArgs = ['maMH_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MaSV_id" name="maMH_id" value="<?php echo e($diem->maMH_id); ?>" />
					<?php $__errorArgs = ['tenlop'];
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
					<label for="phan_tram_TX">Phần trăm(%)điểm thường xuyên</label>
					<select class="form-control <?php $__errorArgs = ['sotc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phan_tram_TX" name="phan_tram_TX">
						<option value="">--Chọn--</option>	
						<option value="0">0%</option>	
						<?php for($i=1;$i<=10;$i++): ?>
						<?php if($diem->phan_tram_TX==$i*10): ?>{
						<option value="<?php echo e($i*10); ?>" selected><?php echo e($i*10); ?>%</option>
					}
						<?php else: ?>
							<option value="<?php echo e($i*10); ?>"><?php echo e($i*10); ?>%</option>
						
						<?php endif; ?>
						$i++;	
						<?php endfor; ?>
					
						
							
							<!-- <option value="10">10%</option>	
							<option value="20">20%</option>	
							<option value="30">30%</option>	
							<option value="40">40%</option>	
							<option value="50">50%</option>
							<option value="60">60%</option>		 -->								
					</select>
					<?php $__errorArgs = ['phan_tram_TX'];
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
					<label for="phan_tram_thi">Phần trăm(%)điểm thi</label>
					<select class="form-control <?php $__errorArgs = ['sotc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phan_tram_thi" name="phan_tram_thi">
						<option value="">--Chọn--</option>
						<option value="0">0%</option>	
	
						<?php for($i=1;$i<=10;$i++): ?>
						<?php if($diem->phan_tram_thi==$i*10): ?>{
					<option value="<?php echo e($i*10); ?>" selected><?php echo e($i*10); ?>%</option>
					}
						<?php else: ?>
							<option value="<?php echo e($i*10); ?>"><?php echo e($i*10); ?>%</option>
						
						<?php endif; ?>
						$i++;	
						<?php endfor; ?>						
					</select>
					<?php $__errorArgs = ['phan_tram_thi'];
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
					<label for="diemTX"> Điểm thường xuyên</label>
					<input type="text" class="form-control <?php $__errorArgs = ['diemTX'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MaSV_id" name="diemTX" value="<?php echo e($diem->diemTX); ?>" />
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
					<label for="diemthil1"> Điểm thi lần 1</label>
					<input type="text" class="form-control <?php $__errorArgs = ['diemTX'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diemthil1" name="diemthil1" value="<?php echo e($diem->diemthil1); ?>" />
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
					<label for="diemthil2"> Điểm thi lần 2</label>
					<input type="text" class="form-control <?php $__errorArgs = ['diemthil2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diemthil2" name="diemthil2" value="<?php echo e($diem->diemthil2); ?>" />
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
			
				

				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/diem/sua.blade.php ENDPATH**/ ?>