@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header"><h4>Cập nhật điểm</h4></div>
		<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
 			   @endforeach
				</div>
		<div class="card-body">
			<form action="{{ url('/diem/sua/' . $diem->MaSV_id.'/'.$diem->maMH_id) }}" method="post">
				@csrf				
				
				<div class="form-group">
					<label for="MaSV_id"> Mã Sinh Viên</label>
					<input type="text" class="form-control @error('MaSV_id') is-invalid @enderror" id="MaSV_id" name="MaSV_id" value="{{ $diem->MaSV_id }}" />
					@error('tenlop')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="maMH_id"> Mã Môn Học</label>
					<input type="text" class="form-control @error('maMH_id') is-invalid @enderror" id="MaSV_id" name="maMH_id" value="{{ $diem->maMH_id }}" />
					@error('tenlop')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="phan_tram_TX">Phần trăm(%)điểm thường xuyên</label>
					<select class="form-control @error('sotc') is-invalid @enderror" id="phan_tram_TX" name="phan_tram_TX">
						<option value="">--Chọn--</option>	
						<option value="0">0%</option>	
						@for($i=1;$i<=10;$i++)
						@if($diem->phan_tram_TX==$i*10){
						<option value="{{$i*10}}" selected>{{$i*10}}%</option>
					}
						@else
							<option value="{{$i*10}}">{{$i*10}}%</option>
						
						@endif
						$i++;	
						@endfor
					
						
							
							<!-- <option value="10">10%</option>	
							<option value="20">20%</option>	
							<option value="30">30%</option>	
							<option value="40">40%</option>	
							<option value="50">50%</option>
							<option value="60">60%</option>		 -->								
					</select>
					@error('phan_tram_TX')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="phan_tram_thi">Phần trăm(%)điểm thi</label>
					<select class="form-control @error('sotc') is-invalid @enderror" id="phan_tram_thi" name="phan_tram_thi">
						<option value="">--Chọn--</option>
						<option value="0">0%</option>	
	
						@for($i=1;$i<=10;$i++)
						@if($diem->phan_tram_thi==$i*10){
					<option value="{{$i*10}}" selected>{{$i*10}}%</option>
					}
						@else
							<option value="{{$i*10}}">{{$i*10}}%</option>
						
						@endif
						$i++;	
						@endfor						
					</select>
					@error('phan_tram_thi')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="diemTX"> Điểm thường xuyên</label>
					<input type="text" class="form-control @error('diemTX') is-invalid @enderror" id="MaSV_id" name="diemTX" value="{{ $diem->diemTX }}" />
					@error('diemTX')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="diemthil1"> Điểm thi lần 1</label>
					<input type="text" class="form-control @error('diemTX') is-invalid @enderror" id="diemthil1" name="diemthil1" value="{{ $diem->diemthil1 }}" />
					@error('diemthil1')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="diemthil2"> Điểm thi lần 2</label>
					<input type="text" class="form-control @error('diemthil2') is-invalid @enderror" id="diemthil2" name="diemthil2" value="{{ $diem->diemthil2 }}" />
					@error('diemthil2')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
			
				

				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection