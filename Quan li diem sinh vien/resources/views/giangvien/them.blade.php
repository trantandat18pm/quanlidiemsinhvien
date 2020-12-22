@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm giảng viên</div>
		<div class="card-body">
			<form action="{{ url('/giangvien/them') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="magv">Mã giảng viên </label>
					<input type="text" class="form-control @error('magv') is-invalid @enderror" id="magv" name="magv" />
					@error('magv')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="tengv">Tên giảng viên</label>
					<input type="text" class="form-control @error('tengv') is-invalid @enderror" id="tengv" name="tengv" />
					@error('tengv')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="khoa_id">Khoa</label>
					<select class="form-control @error('khoa_id') is-invalid @enderror" id="khoa_id" name="khoa_id">
						<option value="">-- Chọn khoa --</option>
						@foreach($khoa as $value)
							<option value="{{ $value->makhoa }}">{{ $value->tenkhoa }}</option>
						@endforeach
					</select>
					@error('khoa_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>

				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection