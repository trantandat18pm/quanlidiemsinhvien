@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
	<div class="card">
		<div class="card-header text-center">Thêm Thông Tin Giảng Dạy</div>
		<div class="card-body">
			<form action="{{ url('/thongtingiangday/them') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="makhoa">Khoa</label>
					<select class="form-control @error('makhoa') is-invalid @enderror" id="makhoa" name="makhoa">
						<option value="">-- Chọn khoa --</option>
						@foreach($khoa as $value)
							<option value="{{ $value->makhoa }}">{{ $value->tenkhoa }}</option>
						@endforeach
					</select>
					@error('makhoa')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="monhoc">Môn học</label>
					<select class="form-control @error('monhoc') is-invalid @enderror" id="monhoc" name="monhoc">
						<option value="">-- Chọn môn --</option>
						@foreach($monhoc as $value)
							<option value="{{ $value->mamon }}">{{ $value->tenmh }}</option>
						@endforeach
					</select>
					@error('monhoc')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="magv">Giảng Viên</label>
					<select class="form-control @error('magv') is-invalid @enderror" id="magv" name="magv">
						<option value="">-- Chọn giảng viên --</option>
						@foreach($giangvien as $value)
							<option value="{{ $value->magv }}">{{ $value->tengv }}</option>
						@endforeach
					</select>
					@error('magv')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="malop">Lớp</label>
					<select class="form-control formselect required @error('malop') is-invalid @enderror" id="malop" name="malop">
					<option value="">-- Chọn lớp --</option>
						@foreach($lop as $value)
							<option value="{{ $value->malop }}">{{ $value->tenlop }}</option>
						@endforeach
					</select>
					@error('malop')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
 			   @endforeach
				</div>

			
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
	</script>
			<script>
					$(document).ready(function () {
					$('#makhoa').on('change', function () {
				
					let khoa_id = $(this).val();
					$('#magv').empty();
					$('#magv').append(`<option value="0" disabled selected>Processing...</option>`);
					$.get("{{ route('ajaxGV') }}", {khoa_id:khoa_id}, function(data){
						console.log(data)
						$('#magv').empty();
						$('#magv').html(data);
					})
					
			});
		});
		</script>
		</script>
			<script>
					$(document).ready(function () {
					$('#makhoa').on('change', function () {
				
					let khoa_id = $(this).val();
					$('#malop').empty();
					$('#malop').append(`<option value="0" disabled selected>Processing...</option>`);
					$.get("{{ route('ajaxLop') }}", {khoa_id:khoa_id}, function(data){
						console.log(data)
						$('#malop').empty();
						$('#malop').html(data);
					})
					
			});
		});
		</script>
	
@endsection