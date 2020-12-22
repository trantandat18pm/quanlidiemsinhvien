@extends('layouts.app')

@section('content')
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
			<a href="{{ url('/diem/xuat') }}" class="btn btn-info"><i class="fal fa-download"></i> Xuất ra Excel</a>
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
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
 			   @endforeach
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
					@foreach($diem as $value)
						<tr class="text-center">
						<!-- 	<td>{{ $loop->iteration }}</td> -->
							<td>{{ $value->MaSV_id	 }}</td>
							<td>{{ $value->maMH_id	 }}</td>
							<td>{{ $value->phan_tram_TX	 }}</td>
							<td>{{ $value->phan_tram_thi	 }}</td>
							<td>{{ $value->diemTX }}</td>
							<td>{{ $value->diemthil1 }}</td>
							<td>{{ $value->diemthil2 }}</td>
							<td>{{ $value->diemtb }}</td>
							<td>{{ $value->loaidiem }}</td>
							
							<td class="text-center"><a href="{{ url('/diem/sua/' . $value->MaSV_id.'/'.$value->maMH_id) }}"><i class="fal fa-edit"></i></a></td>
							
						</tr>
					@endforeach
				</tbody>
			</table>
			<br>
			<nav aria-label="Page navigation">
			{!! $diem->links()!!}
			</nav>
		</div>
	</div>
		<form action="{{ url('/diem/nhap') }}" method="post" enctype="multipart/form-data" >
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
					<a href="{{ url('/diem/download/')}}" class="btn btn-info"><i class="fal fa-download"></i>Tải file mẫu</a>
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
		<form action="{{ url('/diem/them') }}" method="post" enctype="multipart/form-data" id="diem_them" onsubmit="checkdata()">
		@csrf

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
					<select class="form-control @error('malop') is-invalid @enderror" id="malop" name="malop">
						<option value="">-- Chọn lớp --</option>						
						@foreach($malop as $value)
							<option value="{{ $value->ma_lop }}">{{ $value->ma_lop }}</option>
						@endforeach
					</select>
					@error('malop')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="masv">Mã sinh viên</label>
					<select class="form-control @error('masv') is-invalid @enderror" id="masv" name="masv">
						<option value="">-- Chọn mã sinh viên --</option>						
					
					</select>
					@error('masv')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="maMH_id">Mã môn học</label>
					<select class="form-control @error('maMH_id') is-invalid @enderror" id="maMH_id" name="maMH_id">
						<option value="">-- Chọn mã môn học --</option>
						
					</select>
					@error('khoa_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div id="group-diem-TX">
				<div class="form-group">
					<label for="phan_tram_TX">Phần trăm(%)điểm thường xuyên</label>
					<select class="form-control @error('sotc') is-invalid @enderror" id="phan_tram_TX" name="phan_tram_TX">
						<option value="">--Chọn--</option>	
							<option value="0">0%</option>	
							<option value="10">10%</option>	
							<option value="20">20%</option>	
							<option value="30">30%</option>	
							<option value="40">40%</option>	
							<option value="50">50%</option>
							<option value="60">60%</option>										
					</select>
					@error('phan_tram_TX')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="phan_tram_thi">Phần trăm(%)điểm thi</label>
					<select class="form-control @error('sotc') is-invalid @enderror" id="phan_tram_thi" name="phan_tram_thi">
						<option value="">--Chọn--</option>	
							<option value="0">0%</option>	
							<option value="10">10%</option>	
							<option value="20">20%</option>	
							<option value="30">30%</option>	
							<option value="40">40%</option>	
							<option value="50">50%</option>
							<option value="60">60%</option>										
					</select>
					@error('phan_tram_thi')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="diemTX">Điểm thường xuyên</label>
					<input type="text" class="form-control @error('diemTX') is-invalid @enderror" id="diemTX" name="diemTX" />
					@error('diemTX')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
					<div class="form-group">
					<label for="diemthil1">Điểm thi lần 1</label>
					<input type="text" class="form-control @error('diemthil1') is-invalid @enderror" id="diemthil1" name="diemthil1" />
					@error('diemthil1')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
					<div class="form-group">
					<label for="diemthil2">Điểm thi lần 2</label>
					<input type="text" class="form-control @error('diemthil2') is-invalid @enderror" id="diemthil2" name="diemthil2" />
					@error('diemthil2')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>	
				</div>
				
				<div id="group-diem-do-an">
					<div class="form-group">
					<label for="diem_do_an">Điểm đồ án</label>
					<input type="text" class="form-control @error('diemthil2') is-invalid @enderror" id="diem_do_an" name="diem_do_an" />
					@error('diem_do_an')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
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
					$.get("{{ route('ajax1') }}", {lop_id:lop_id}, function(data){
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
					$.get("{{ route('ajax') }}", {lop_id:lop_id}, function(data){
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
	url : '{{URL::to('/diem/search')}}',
	data:{'search':$value},
	success:function(data){
	$('tbody').html(data);
	}
	});
	})
</script>
@endsection