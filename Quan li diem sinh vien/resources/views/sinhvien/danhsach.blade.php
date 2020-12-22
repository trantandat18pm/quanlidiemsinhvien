@extends('layouts.app')

@section('content')


	<div class="card">
		<div class="card-header text-center"> <h2>Sinh viên </h2></div>
		<div class="card-body">
			<p>
				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addSV"><i class="fal fa-plus"></i> Thêm mới</a>
				<a href="#nhap" class="btn btn-success" data-toggle="modal" data-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
				<a href="{{ url('/sinhvien/xuat') }}" class="btn btn-info"><i class="fal fa-download"></i> Xuất ra Excel</a>

	
			</p>
			<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
 			   @endforeach
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
		@foreach($khoa as $k)
		<option value="{{ $k->makhoa }}">{{ $k->tenkhoa }}</option>
		@endforeach
       
      </select>
    </div>
    <div class="form-group col-md-4">
   <label for="inputState">Lớp</label>
      <select id="lop" class="form-control">
        <option selected>Chọn lớp...</option>
       
		@foreach($lop as $value)
		<option value="{{ $value->malop }}">{{ $value->tenlop }}</option>
		@endforeach
      
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
					@foreach($sinhvien as $value)
						<div class="edit">	
						<tr>
							<td hidden>{{ $value->id }}</td>
							<td>{{ $value->masv }}</td>
							<td>{{ $value->hoten }}</td>
							<td>{{ $value->ngaysinh }}</td>
							<td>{{ $value->dienthoai }}</td>
							<td>{{ $value->email }}</td>
							<td>{{ $value->lop_id }}</td>
							<td class="text-center "><a href="#" class="editbtn"><i class="btn btn-info" id="updateSVbtn">Sửa</i></a></td>
							<td class="text-center"><a href="sinhvien/xoa/{{$value->id}}"><i class="btn btn-danger">Xóa</i></a></td>
						</tr>
						</div>
					@endforeach
				</tbody>
			</table>
			<nav aria-label="Page navigation">
			{!! $sinhvien->links()!!}
			</nav>
		</div>
	</div>	
        

	<form action="{{ url('/sinhvien/nhap') }}" method="post" enctype="multipart/form-data">
		@csrf
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
							<img src="{{ asset('public/images/excel.png')}}" style="width: 100%;height: 100%;">

						</div>
							<a href="{{ url('/sinhvien/download/cc/')}}" class="btn btn-info"><i class="fal fa-download"></i>Tải file mẫu</a>
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
	<form action="{{ url('/sinhvien/them') }}" method="post" enctype="multipart/form-data">
		@csrf

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
					<select class="form-control @error('lop_id') is-invalid @enderror" id="lop_id" name="lop_id">
						<option value="">-- Chọn lớp --</option>
						@foreach($lop as $value)
							<option value="{{ $value->malop }}">{{ $value->tenlop }}</option>
						@endforeach
					</select>
					@error('lop_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="masv">MSSV</label>
					<input type="text" class="form-control @error('masv') is-invalid @enderror" id="masv" name="masv" />
					@error('masv')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="hoten">Họ Tên</label>
					<input type="text" class="form-control @error('hoten') is-invalid @enderror" id="hoten" name="hoten" />
					@error('hoten')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>				
				
				
				<div class="form-group">
					<label for="ngaysinh">Năm sinh</label>
					<input type="text" class="form-control @error('ngaysinh') is-invalid @enderror" id="ngaysinh" name="ngaysinh" />
					@error('ngaysinh')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<!-- <div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" />
					@error('email')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div> -->
				
				<div class="form-group">
					<label for="dienthoai">Điện thoại</label>
					<input type="text" class="form-control @error('dienthoai') is-invalid @enderror" id="dienthoai" name="dienthoai" />
					@error('dienthoai')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="ghichu">Ghi chú</label>
					<input type="text" class="form-control @error('ghichu') is-invalid @enderror" id="ghichu" name="ghichu" />
					@error('ghichu')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
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
	<form id="edit_form" action="{{ url('/sinhvien/sua/') }}" method="post">
		<input type="hidden" name="id" id="id">

		@csrf
	
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
					<input type="text" class="form-control @error('masv') is-invalid @enderror" id="masvedit" name="masvedit" />
					@error('masv')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="hoten">Họ Tên</label>
					<input type="text" class="form-control @error('hoten') is-invalid @enderror" id="hotenedit" name="hotenedit" />
					@error('hoten')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>				
				
				
				<div class="form-group">
					<label for="ngaysinh">Năm sinh</label>
					<input type="text" class="form-control @error('ngaysinh') is-invalid @enderror" id="ngaysinhedit" name="ngaysinhedit" />
					@error('ngaysinh')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control @error('email') is-invalid @enderror" id="emailedit" name="emailedit" />
					@error('email')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="dienthoai">Điện thoại</label>
					<input type="text" class="form-control @error('dienthoai') is-invalid @enderror" id="dienthoaiedit" name="dienthoaiedit" />
					@error('dienthoai')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="lop_id">Mã lớp</label>
					<select class="form-control @error('lop_id') is-invalid @enderror" id="lop_idedit" name="lop_idedit">
						<option value="">-- Chọn lớp --</option>
						@foreach($lop as $value)
							<option value="{{ $value->malop }}">{{ $value->tenlop }}</option>
						@endforeach
					</select>
					@error('lop_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
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
	url : '{{URL::to('/search/demo')}}',
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
	url : '{{URL::to('/search/lop')}}',
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
					$.get("{{ route('ajaxSV') }}", {makhoa:makhoa}, function(data){
						console.log(data)
						$('#lop').empty();
						$('#lop').html(data);
					})
					
			});
		});
		</script>

@endsection