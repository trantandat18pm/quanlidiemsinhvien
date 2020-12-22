@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa môn học</div>
		<div class="card-body">
			<form action="{{ url('/monhoc/xoa/' . $mon_hoc->id) }}" method="post">
				@csrf
				<p>Bạn có muốn xóa môn học {{ $mon_hoc->tenkhoa }} không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
@endsection