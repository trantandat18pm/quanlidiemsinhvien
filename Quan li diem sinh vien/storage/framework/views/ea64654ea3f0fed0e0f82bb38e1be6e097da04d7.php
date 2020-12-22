

<?php $__env->startSection('content'); ?>


	<div class="card">
		<div class="card-header text-center"> <h2>Sinh viên </h2></div>
		<div class="card-body">
			<p>
				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addSV"><i class="fal fa-plus"></i> Thêm mới</a>
				<a href="#nhap" class="btn btn-success" data-toggle="modal" data-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
				<a href="<?php echo e(url('/sinhvien/xuat')); ?>" class="btn btn-info"><i class="fal fa-download"></i> Xuất ra Excel</a>

	
			</p>
			<div class="flash-message">
				<?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(Session::has('alert-' . $msg)): ?>
					<p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					<?php endif; ?>
 			   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>

			<form> 

  <div class="form-row">
  
     <div class="form-group col-md-4">
      <label for="inputState">Tìm kiếm</label>
     	<input type="text" placeholder="Search text" id="search" name="search" class="form-control" >	
    </div>
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
						<div class="edit">	
						<tr>
							<td hidden><?php echo e($value->id); ?></td>
							<td><?php echo e($value->masv); ?></td>
							<td><?php echo e($value->hoten); ?></td>
							<td><?php echo e($value->ngaysinh); ?></td>
							<td><?php echo e($value->dienthoai); ?></td>
							<td><?php echo e($value->email); ?></td>
							<td><?php echo e($value->lop_id); ?></td>
							<td class="text-center "><a href="#" class="editbtn"><i class="btn btn-info" id="updateSVbtn">Sửa</i></a></td>
							<td class="text-center"><a href="sinhvien/xoa/<?php echo e($value->id); ?>"><i class="btn btn-danger">Xóa</i></a></td>
						</tr>
						</div>
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
								<label for="recipient-name" class="col-form-label">Mấu file Excel</label>
							<img src="<?php echo e(asset('public/images/excel.png')); ?>" style="width: 100%;height: 100%;">

						</div>
							<a href="<?php echo e(url('/sinhvien/download/cc/')); ?>" class="btn btn-info"><i class="fal fa-download"></i>Tải file mẫu</a>
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
	<form action="<?php echo e(url('/sinhvien/them')); ?>" method="post" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>

		<div class="modal fade" id="addSV" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Thêm sinh viên</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
					<label for="lop_id">Mã lớp</label>
					<select class="form-control <?php $__errorArgs = ['lop_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="lop_id" name="lop_id">
						<option value="">-- Chọn lớp --</option>
						<?php $__currentLoopData = $lop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->malop); ?>"><?php echo e($value->tenlop); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<?php $__errorArgs = ['lop_id'];
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
					<label for="masv">MSSV</label>
					<input type="text" class="form-control <?php $__errorArgs = ['masv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="masv" name="masv" />
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
					<label for="hoten">Họ Tên</label>
					<input type="text" class="form-control <?php $__errorArgs = ['hoten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="hoten" name="hoten" />
					<?php $__errorArgs = ['hoten'];
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
					<label for="ngaysinh">Năm sinh</label>
					<input type="text" class="form-control <?php $__errorArgs = ['ngaysinh'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ngaysinh" name="ngaysinh" />
					<?php $__errorArgs = ['ngaysinh'];
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
				
				<!-- <div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" />
					<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div> -->
				
				<div class="form-group">
					<label for="dienthoai">Điện thoại</label>
					<input type="text" class="form-control <?php $__errorArgs = ['dienthoai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dienthoai" name="dienthoai" />
					<?php $__errorArgs = ['dienthoai'];
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
					<label for="ghichu">Ghi chú</label>
					<input type="text" class="form-control <?php $__errorArgs = ['ghichu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ghichu" name="ghichu" />
					<?php $__errorArgs = ['ghichu'];
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
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
						<button type="submit" class="btn btn-primary">Nhập dữ liệu</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<form id="edit_form" action="<?php echo e(url('/sinhvien/sua/')); ?>" method="post">
		<input type="hidden" name="id" id="id">

		<?php echo csrf_field(); ?>
	
		<div class="modal fade" id="capnhatthongtinSV" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Update sinh viên</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
				
				<div class="form-group">
					<label for="masv">MSSV</label>
					<input type="text" class="form-control <?php $__errorArgs = ['masv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="masvedit" name="masvedit" />
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
					<label for="hoten">Họ Tên</label>
					<input type="text" class="form-control <?php $__errorArgs = ['hoten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="hotenedit" name="hotenedit" />
					<?php $__errorArgs = ['hoten'];
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
					<label for="ngaysinh">Năm sinh</label>
					<input type="text" class="form-control <?php $__errorArgs = ['ngaysinh'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ngaysinhedit" name="ngaysinhedit" />
					<?php $__errorArgs = ['ngaysinh'];
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
					<label for="email">Email</label>
					<input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="emailedit" name="emailedit" />
					<?php $__errorArgs = ['email'];
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
					<label for="dienthoai">Điện thoại</label>
					<input type="text" class="form-control <?php $__errorArgs = ['dienthoai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dienthoaiedit" name="dienthoaiedit" />
					<?php $__errorArgs = ['dienthoai'];
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
					<label for="lop_id">Mã lớp</label>
					<select class="form-control <?php $__errorArgs = ['lop_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="lop_idedit" name="lop_idedit">
						<option value="">-- Chọn lớp --</option>
						<?php $__currentLoopData = $lop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value->malop); ?>"><?php echo e($value->tenlop); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<?php $__errorArgs = ['lop_id'];
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
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
						<button type="submit" class="btn btn-primary">Nhập dữ liệu</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	
<script>
  $(document).ready(function(){
    $('.editbtn').click(function(){
    	 $('#capnhatthongtinSV').modal('show');
    	$tr=$(this).closest('tr');
    	var data=$tr.children("td").map(function(){
    		return $(this).text();
    	}).get();
    	console.log(data);
    	$('#id').val(data[0]);	
    	$('#masvedit').val(data[1]);	
    	$('#hotenedit').val(data[2]);	
    	$('#ngaysinhedit').val(data[3]);	
    	$('#dienthoaiedit').val(data[4]);	
    	$('#emailedit').val(data[5]);	
    	$('#lop_idedit').val(data[6]);  		
  			});

    	
     });
</script>



	

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function(){
    $('.edit').click(function(){
      $(this).addClass('editMode');
    });

    $(".edit").focusout(function(){
      $(this).removeClass("editMode");
      var id = this.id;
      var split_id = id.split("_");
      var field_name = split_id[0];
      var edit_id = split_id[1];
      var value = $(this).text();

      $.ajax({
         url: 'update.php',
         type: 'post',
         data: { field:field_name, value:value, id:edit_id },
         success:function(response){
            console.log('Save successfully');
         }
       });

    });
  });
</script>


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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/sinhvien/danhsach.blade.php ENDPATH**/ ?>