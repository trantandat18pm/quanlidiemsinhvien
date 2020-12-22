@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm Khoa</div>
		<div class="card-body">
			<form action="{{ url('/khoa/them') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="makhoa">Mã khoa</label>
					<input type="text" class="form-control @error('makhoa') is-invalid @enderror" id="makhoa" name="makhoa" />
					@error('makhoa')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="tenkhoa">Tên khoa</label>
					<input type="text" class="form-control @error('tenkhoa') is-invalid @enderror" id="tenkhoa" name="tenkhoa" />
					@error('tenkhoa')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection