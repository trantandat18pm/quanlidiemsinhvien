@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa điểm</div>
		<div class="card-body">
			<form action="{{ url('/diem/xoa/' . $diem->MaSV_id.'/'.$diem->maMH_id) }}" method="post">
				@csrf
				<p>Bạn có muốn xóa diem {{ $diem->MaSV_id }} không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
@endsection