

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header text-center"> <h2> Danh sách điểm sinh viên<span class="text-danger"> </span> </h2>
		
		</div>
		<div class="card-body">
			<p>
				<!-- <a href="<?php echo e(url('/sinhvien/them')); ?>" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a>
				<a href="#nhap" class="btn btn-success" data-toggle="modal" data-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
				<a href="<?php echo e(url('/sinhvien/xuat')); ?>" class="btn btn-info"><i class="fal fa-download"></i> Xuất ra Excel</a> -->
				

			</p>


  <div class="form-row">
  	 <div class="form-group col-md-4">
			<label for="cars">Học kì:</label>
			<select name="hocki" id="hocki"  class="form-control">
 			 <option value="0">---Tất cả học kì--	</option>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			  <option value="5">5</option>
			  <option value="6">6</option>
			  <option value="7">7</option>
			  <option value="8">8</option>
			</select>

			
		</div>
		<div class="form-group col-md-4">
			  <label for="inputState">Xuất file Excel</label>
			<br>
			
			<a href="<?php echo e(url('/diem/xuat')); ?>" class="btn btn-info"><i class="fal fa-download"></i> Xuất ra Excel</a>
		</div>

		</div>

			<div id="sum"></div>
			<div id="sum1"></div>
			
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						
						<th>Mã môn</th>
						<th>Tên môn</th>
						<th>Số tín chỉ</th>
						<th>% KT</th>
						<th>% Thi</th>
						<th>Điểm thường xuyên</th>
						<th >Điểm thi lần 1</th>
						<th>Điểm thi lần 2</th>
						<th>Điểm TB</th>
						<th>Loại điểm</th>
						
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							
							<td><?php echo e($value->maMH_id); ?></td>
							<td><?php echo e($value->tenmh); ?></td>
							<td><?php echo e($value->sotc); ?></td>
							<td><?php echo e($value->phan_tram_TX); ?></td>
							<td><?php echo e($value->phan_tram_thi); ?></td>
							<td><?php echo e($value->diemTX); ?></td>
							<td><?php echo e($value->diemthil1); ?></td>
							<td><?php echo e($value->diemthil2); ?></td>
							<td><?php echo e($value->diemtb); ?></td>
							<td><?php echo e($value->loaidiem); ?></td>

							
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
	<script type="text/javascript">
	$('#hocki').on('change',function(){
	$value=$(this).val();
	$.ajax({
	type : 'get',
	url : '<?php echo e(URL::to('/danhsachdiem/hocki')); ?>',
	data:{'search':$value},
	success:function(data){
	$('tbody').html(data);

	}
	});
	})
</script>
<script type="text/javascript">
	$('#hocki').on('change',function(){
	$value=$(this).val();
	$.ajax({
	type : 'get',
	url : '<?php echo e(URL::to('/danhsachdiem/tb')); ?>',
	data:{'search1':$value},
	success:function(data){
	$('#sum').html(data);
	
	}
	});
	})
</script>
<script type="text/javascript">
	$('#hocki').on('change',function(){
	$value=$(this).val();
	$.ajax({
	type : 'get',
	url : '<?php echo e(URL::to('/danhsachdiem/tbhe4')); ?>',
	data:{'search1':$value},
	success:function(data){
	$('#sum1').html(data);
	
	}
	});
	})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/thongtin/danhsachdiem.blade.php ENDPATH**/ ?>