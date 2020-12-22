@extends('layouts.app')

@section('content')
		<div class="card">
		<div class="card-header"><h3 class="text-center">Cập nhật thông tin tài khoản</h3></div>
		<div class="card-body">
			<form action="{{ url('/nguoidung/sua/' . $nd->id) }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="malop">Tên người dùng</label>
					<input type="text" class="form-control @error('id') is-invalid @enderror" id="malop" name="malop" value="{{ $nd->name }}" />
					@error('id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
			
				<div class="form-group">
				    <label for="hinhanh">Hình ảnh</label>
				   <img src="{{ asset($nd->hinhanh) }}" class="brand-image img-circle elevation-3" style="width: 150px;height: 150px;">
				  </div>
				
				  <div class="form-group">
				    <label for="hinhanh">Hình ảnh</label>
				    <input type="file" class="form-control-file" id="hinhanh" name="hinhanh">
				  </div>

				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection