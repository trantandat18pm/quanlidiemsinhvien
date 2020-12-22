@extends('layouts.app')

@section('content')
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#hide").hide(1000);
     $("#doan").fadeIn();
  });
});
</script>
<button>Hide</button>
	<div class="card">
		<div class="card-header">Thêm điểm</div>
		<div class="card-body">
			<form action="{{ url('/diem/them') }}" method="post" id="demo2">
				@csrf
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
				<div id="hide">
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
				
					<div style="display: none;" id="doan">
						
					<div class="form-group" >
					<label for="diemdoan">Điểm đồ án</label>
					<input type="text" class="form-control @error('diemdoan') is-invalid @enderror" id="diemdoan" name="diemdoan" />
					@error('diemdoan')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>

					<div class="form-group">
					<label for="sotc">Phần trăm(%)điểm thường xuyên</label>
					<select class="form-control @error('sotc') is-invalid @enderror" id="sotc" name="sotc">
						<option value="">--Chọn--</option>	
							<option value="0">0 %</option>	
							<option value="10">10%</option>	
							<option value="20">20%</option>	
							<option value="30">30%</option>	
							<option value="40">40%</option>	
							<option value="50">50%</option>
							<option value="60">60%</option>										
					</select>
					@error('khoa_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<label for="sotc">Phần trăm(%)điểm thi</label>
					<select class="form-control @error('sotc') is-invalid @enderror" id="sotc" name="sotc">
						<option value="">--Chọn--</option>	
							<option value="0">0 %</option>	
							<option value="10">10%</option>	
							<option value="20">20%</option>	
							<option value="30">30%</option>	
							<option value="40">40%</option>	
							<option value="50">50%</option>
							<option value="60">60%</option>										
					</select>
					@error('khoa_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>

					</div>
		        
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
					$.get("{{ route('ajax1') }}", {lop_id:lop_id}, function(data){
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
@endsection