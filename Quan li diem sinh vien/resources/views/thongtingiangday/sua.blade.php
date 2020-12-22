@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Cập nhật thông tin giảng dạy</div>
		<div class="card-body">
			<form action="{{ url('/thongtingiangday/sua/' . $thongtingiangday->id) }}" method="post">
				@csrf
				<div class="form-group">
					<label for="magv">Mã giảng viên</label>
					<input type="text" class="form-control @error('magv') is-invalid @enderror" id="ma_gv" name="ma_gv" value="{{ $thongtingiangday->ma_gv }}" />
					@error('magv')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
		
				<div class="form-group">
					<label for="ma_mh">Mã môn</label>
					<input type="text" class="form-control @error('ma_mh') is-invalid @enderror" id="ma_mh" name="ma_mh" value="{{ $thongtingiangday->ma_mh }}" />
					@error('ma_mh')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
					<div class="form-group">
						<label for="ma_lop">Mã lớp</label>
						<input type="text" class="form-control @error('ma_mh') is-invalid @enderror" id="ma_lop" name="ma_lop" value="{{ $thongtingiangday->ma_lop }}" />
						@error('ma_lop')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
					</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection