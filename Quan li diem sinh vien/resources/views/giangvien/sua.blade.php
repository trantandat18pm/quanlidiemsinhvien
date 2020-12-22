@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa lớp</div>
		<div class="card-body">
		
			<form action="{{ url('/giangvien/sua/' . $giangvien->id) }}" method="post">
				@csrf
			
				
				<div class="form-group">
					<label for="tengv">Tên lớp</label>
					<input type="text" class="form-control @error('tengv') is-invalid @enderror" id="tengv" name="tengv" value="{{ $giangvien->tengv }}" />
					@error('tengv')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="khoa_id">Khoa</label>
					<select class="form-control @error('khoa_id') is-invalid @enderror" id="khoa_id" name="khoa_id">
						<option value="">-- Chọn khoa --</option>
						@foreach($khoa as $value)
							@if($giangvien->khoa_id == $value->makhoa)
								<option value="{{ $value->makhoa }}" selected>{{ $value->tenkhoa }}</option>
							@else
								<option value="{{ $value->makhoa }}">{{ $value->tenkhoa }}</option>
							@endif
						@endforeach
					</select>
					@error('khoa_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>

				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection