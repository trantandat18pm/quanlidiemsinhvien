@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm lớp</div>
		<div class="card-body">
			<form action="{{ url('/lop/them') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="malop">Mã lớp</label>
					<input type="text" class="form-control @error('malop') is-invalid @enderror" id="malop" name="malop" />
					@error('malop')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="tenlop">Tên lớp</label>
					<input type="text" class="form-control @error('tenlop') is-invalid @enderror" id="tenlop" name="tenlop" />
					@error('tenlop')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="khoa_id">Mã khoa</label>
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