@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa khoa</div>
		<div class="card-body">
			<form action="{{ url('/khoa/sua/' . $khoa->id) }}" method="post">
				@csrf
				<div class="form-group">
					<label for="makhoa">Mã khoa</label>
					<input type="text" class="form-control @error('makhoa') is-invalid @enderror" id="makhoa" name="makhoa" value="{{ $khoa->makhoa }}" />
					@error('makhoa')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="tenkhoa">Tên khoa</label>
					<input type="text" class="form-control @error('tenkhoa') is-invalid @enderror" id="tenkhoa" name="tenkhoa" value="{{ $khoa->tenkhoa }}" />
					@error('tenkhoa')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection