@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa giảng viên</div>
		<div class="card-body">
			<form action="{{ url('/giangvien/xoa/' . $giangvien->id) }}" method="post">
				@csrf
				<p>Bạn có muốn xóa lớp {{ $giangvien->tengv }} không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
@endsection