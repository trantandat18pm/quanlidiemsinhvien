@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa môn học</div>
		<div class="card-body">
			<form action="{{ url('/monhoc/sua/' . $mon_hoc->id) }}" method="post">
				@csrf
				<div class="form-group">
					<label for="mamon">Mã môn học</label>
					<input type="text" class="form-control @error('id') is-invalid @enderror" id="mamon" name="mamon" value="{{ $mon_hoc->mamon }}" />
					@error('mamon')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="tenmh">Tên môn học</label>
					<input type="text" class="form-control @error('tenmh') is-invalid @enderror" id="tenmh" name="tenmh" value="{{ $mon_hoc->tenmh }}" />
					@error('tenmh')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="phan_tram_thi">Số tín chỉ</label>
					<select class="form-control @error('sotc') is-invalid @enderror" id="sotc" name="sotc">
						<option value="">--Chọn--</option>					
	
						@for($i=1;$i<=10;$i++)
						@if($mon_hoc->sotc==$i){
					<option value="{{$i}}" selected>{{$i}}</option>
					}
						@else
							<option value="{{$i}}">{{$i}}</option>
						
						@endif
						$i++;	
						@endfor						
					</select>
					@error('sotc')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="hocki">Học kì</label>
					<select class="form-control @error('sotc') is-invalid @enderror" id="hocki" name="hocki">
						<option value="">--Chọn--</option>
					
	
						@for($i=1;$i<=10;$i++)
						@if($mon_hoc->hocki==$i){
					<option value="{{$i}}" selected>{{$i}}</option>
					}
						@else
							<option value="{{$i}}">{{$i}}</option>
						
						@endif
						$i++;	
						@endfor						
					</select>
					@error('hocki')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection