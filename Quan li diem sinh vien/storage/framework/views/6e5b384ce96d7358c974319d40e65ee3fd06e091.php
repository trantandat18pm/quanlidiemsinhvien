

<?php $__env->startSection('content'); ?>


	<div class="card">
		<div class="card-header text-center"> <h2>Sinh viên </h2></div>
		<div class="card-body">
			<p>
				<a href="<?php echo e(url('/sinhvien/them')); ?>" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a>
				<a href="#nhap" class="btn btn-success" data-toggle="modal" data-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
				<a href="<?php echo e(url('/sinhvien/xuat')); ?>" class="btn btn-info"><i class="fal fa-download"></i> Xuất ra Excel</a>
						
		<input type="text" placeholder="Search text" id="search" name="search" >	
			</p>
			<form> 
 
  <div class="form-row">
    
    <div class="form-group col-md-4">
      <label for="inputState">Khoa</label>
      <select id="khoa" class="form-control">
         <option selected>Chọn lớp...</option>       
		<?php $__currentLoopData = $khoa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($k->makhoa); ?>"><?php echo e($k->tenkhoa); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
      </select>
    </div>
    <div class="form-group col-md-4">
   <label for="inputState">Lớp</label>
      <select id="lop" class="form-control">
        <option selected>Chọn lớp...</option>
       
		<?php $__currentLoopData = $lop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($value->malop); ?>"><?php echo e($value->tenlop); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
      </select>
    </div>
  </div>
  
</form>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						
						<th>MSSV</th>
						<th>Họ và tên</th>
						<th>Năm sinh</th>
						<th>Điện thoại</th>
						<th>Email</th>
						<th>Lớp</th>
						<th>Sửa</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $sinhvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
						<tr>							
							<td><?php echo e($value->masv); ?></td>
							<td><?php echo e($value->hoten); ?></td>
							<td><?php echo e($value->ngaysinh); ?></td>
							<td><?php echo e($value->dienthoai); ?></td>
							<td><?php echo e($value->email); ?></td>
							<td><?php echo e($value->lop_id); ?></td>
							<td class="text-center"><a href="<?php echo e(url('/sinhvien/sua/' . $value->id)); ?>"><i class="btn btn-info">Sửa</i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/sinhvien/xoa/' . $value->id)); ?>"><i class="btn btn-danger">Xóa</i></a></td>
						</tr>
						
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<nav aria-label="Page navigation">
			<?php echo $sinhvien->links(); ?>

			</nav>
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
	$('#search').on('keyup',function(){
	$value=$(this).val();
	$.ajax({
	type : 'get',
	url : '<?php echo e(URL::to('/search/demo')); ?>',
	data:{'search':$value},
	success:function(data){
	$('tbody').html(data);
	}
	});
	})
</script>
<script type="text/javascript">
	$('#lop').on('change',function(){
	$value=$(this).val();
	$.ajax({
	type : 'get',
	url : '<?php echo e(URL::to('/search/lop')); ?>',
	data:{'search':$value},
	success:function(data){
	$('tbody').html(data);
	}
	});
	})
</script>
</script>
			<script>
					$(document).ready(function () {
					$('#khoa').on('change', function () {
				
					let makhoa = $(this).val();
					$('#lop').empty();
					$('#lop').append(`<option value="0" disabled selected>Processing...</option>`);
					$.get("<?php echo e(route('ajaxSV')); ?>", {makhoa:makhoa}, function(data){
						console.log(data)
						$('#lop').empty();
						$('#lop').html(data);
					})
					
			});
		});
		</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\Quan_Diem_SV - Loading\resources\views/sinhvien/danhsach.blade.php ENDPATH**/ ?>