@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa khoa</div>
		<div class="card-body">
			<form action="{{ url('/thongtingiangday/xoa/' . $tt->id) }}" method="post">
				@csrf
				<p>Bạn có muốn xóa thông tin giảng dạy của giảng viên {{ $tt->ma_gv }} với môn học có mã {{ $tt->ma_mh }} của lớp {{ $tt->ma_lop }}  không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
@endsection