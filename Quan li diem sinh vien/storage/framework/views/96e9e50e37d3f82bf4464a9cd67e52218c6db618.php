

<?php $__env->startSection('content'); ?>
<script>
$(document).ready(function(){
  $("#them-diem").click(function(){
  
     $("#btn-loai-diem").fadeToggle("slow");

  });
});
</script>
<script>
$(document).ready(function(){
  $("#btn-tx-thi").click(function(){
     $("#group-diem-do-an").hide();
      $("#diem_do_an").val("");
         $("#malop").val("");
         $("#maMH_id").val("");
         $("#masv").val(""); 
         $("#phan_tram_TX").val("");
         $("#phan_tram_thi").val("");
         $("#diemTX").val("");   
         $("#diemthil1").val("");   
         $("#diemthil2").val("");   
      $("#group-diem-TX").show();


  });
});
</script>
<script>
$(document).ready(function(){
  $("#btn-do-an").click(function(){
     $("#group-diem-TX").hide();
     $("#diem_do_an").val("");
         $("#malop").val("");
         $("#maMH_id").val("");
         $("#masv").val(""); 
         $("#phan_tram_TX").val("");
         $("#phan_tram_thi").val("");
         $("#diemTX").val("");   
         $("#diemthil1").val("");   
         $("#diemthil2").val("");  
      $("#group-diem-do-an").show();


  });
});
</script>

	

	<div class="card">
		<div class="card-header text-center"><h2>Điểm</h2></div>
		<div class="card-body">
			<p><a href="#" class="btn btn-primary" id="them-diem"><i class="fal fa-plus"></i> Thêm mới</a>
				<a href="#nhap" class="btn btn-success" data-toggle="modal" data-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
			<a href="<?php echo e(url('/diem/xuat')); ?>" class="btn btn-info"><i class="fal fa-download"></i> Xuất ra Excel</a>
			</p>
			<div id="btn-loai-diem" style="display: none">
			<a href="" class="btn btn-primary"  id="btn-do-an" data-toggle="modal" data-target="#Insert-diem">100% Đồ án</a>
			<a href="" class="btn btn-primary" id="btn-tx-thi" data-toggle="modal" data-target="#Insert-diem">Thi & Thường Xuyên</a>
		</div>

  <div class="form-row">
    
     <div class="form-group col-md-4">
      <label for="inputState">Tìm kiếm</label>
     	<input type="text" placeholder="Search text" id="search" name="search" class="form-control" >	
    </div>

  </div>
			<div class="flash-message">
				<?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(Session::has('alert-' . $msg)): ?>
					<p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					<?php endif; ?>
 			   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<table class="table table-bordered table-sm">
				<thead>
					<tr class="text-center">
<!-- 						<th class="w-5">#</th>
 -->						<th class="w-10">Mã sinh viên</th>
						<th>Mã môn học</th>
						<th>Phần trăm TX</th>
						<th>Phần trăm thi</th>
						<th>Điểm thường xuyên</th>
						<th class="w-15">Điểm thi lần 1</th>
						<th class="w-15">Điểm thi lần 2</th>
						<th class="w-15">Điểm trung bình</th>
						<th class="w-15">Loại điểm</th>
						<th class="w-5">Sửa</th>

					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $diem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr class="text-center">
						<!-- 	<td><?php echo e($loop->iteration); ?></td> -->
							<td><?php echo e($value->MaSV_id); ?></td>
							<td><?php echo e($value->maMH_id); ?></td>
							<td><?php echo e($value->phan_tram_TX); ?></td>
							<td><?php echo e($value->phan_tram_thi); ?></td>
							<td><?php echo e($value->diemTX); ?></td>
							<td><?php echo e($value->diemthil1); ?></td>
							<td><?php echo e($value->diemthil2); ?></td>
							<td><?php echo e($value->diemtb); ?></td>
							<td><?php echo e($value->loaidiem); ?></td>
							
							<td class="text-center"><a href="<?php echo e(url('/diem/sua/' . $value->MaSV_id.'/'.$value->maMH_id)); ?>"><i class="fal fa-edit"></i></a></td>
							
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<br>
			<nav aria-label="Page navigation">
			<?php echo $diem->links(); ?>

			</nav>
		</div>
	</div>
		<form action="<?php echo e(url('/diem/nhap')); ?>" method="post" enctype="multipart/form-data" >
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
					<a href="<?php echo e(url('/diem/download/')); ?>" class="btn btn-info"><i class="fal fa-download"></i>Tải file mẫu</a>
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
		<form action="<?php echo e(url('/diem/them')); ?>" method="post" enctype="multipart/form-data" id="diem_them" onsubmit="checkdata()">
		<?php echo csrf_field(); ?>

		<div class="modal fade" id="Insert-diem" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Thêm điểm sinh viên</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
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
				<div id="group-diem-TX">
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
							<option value="10">10%</option>	
							<option value="20">20%</option>	
							<option value="30">30%</option>	
							<option value="40">40%</option>	
							<option value="50">50%</option>
							<option value="60">60%</option>										
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
							<option value="10">10%</option>	
							<option value="20">20%</option>	
							<option value="30">30%</option>	
							<option value="40">40%</option>	
							<option value="50">50%</option>
							<option value="60">60%</option>										
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
				</div>
				
				<div id="group-diem-do-an">
					<div class="form-group">
					<label for="diem_do_an">Điểm đồ án</label>
					<input type="text" class="form-control <?php $__errorArgs = ['diemthil2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diem_do_an" name="diem_do_an" />
					<?php $__errorArgs = ['diem_do_an'];
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
							});
		});
		</script>
		<script type="text/javascript">
	$('#search').on('keyup',function(){
	$value=$(this).val();
	$.ajax({
	type : 'get',
	url : '<?php echo e(URL::to('/diem/search')); ?>',
	data:{'search':$value},
	success:function(data){
	$('tbody').html(data);
	}
	});
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/diem/danhsach.blade.php ENDPATH**/ ?>