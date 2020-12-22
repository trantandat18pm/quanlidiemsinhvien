@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm môn học</div>
		<div class="card-body">
			<form action="{{ url('/monhoc/them') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="mamon">Mã môn học</label>
					<input type="text" class="form-control @error('mamon') is-invalid @enderror" id="mamon" name="mamon" />
					@error('mamon')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="tenmh">Tên môn học</label>
					<input type="text" class="form-control @error('tenmh') is-invalid @enderror" id="tenmh" name="tenmh" />
					@error('tenmh')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>	<div class="form-group">
					<label for="sotc">Số tín chỉ</label>
					<select class="form-control @error('sotc') is-invalid @enderror" id="sotc" name="sotc">
						<option value="">-- Chọn số tín chỉ --</option>	
							<option value="1">1</option>	
							<option value="2">2</option>	
							<option value="3">3</option>	
							<option value="4">4</option>	
							<option value="5">5</option>	
							<option value="6">6</option>									
					</select>
					@error('khoa_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="hocki">Số tín chỉ</label>
					<select class="form-control @error('hocki') is-invalid @enderror" id="hocki" name="hocki">
						<option value="">-- Chọn học kì --</option>	
							<option value="1">1</option>	
							<option value="2">2</option>	
							<option value="3">3</option>	
							<option value="4">4</option>	
							<option value="5">5</option>	
							<option value="6">6</option>		
							<option value="6">7</option>	
							<option value="6">8</option>								
					</select>
					@error('hocki')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection