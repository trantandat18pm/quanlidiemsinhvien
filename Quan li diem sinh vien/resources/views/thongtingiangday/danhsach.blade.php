@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header text-center"><h2>Thông Tin Giảng Dạy</h2></div>
		<div class="card-body">
			<p><a href="{{ url('/thongtingiangday/them') }}" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
 			   @endforeach
				</div>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">#</th>
						<th class="w-10">Mã Giảng Viên</th>
						<th>Mã môn học</th>
						<th>Mã lớp</th>
					
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tt as $value)					
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->ma_gv }}</td>
							<td>{{ $value->ma_mh }}</td>
							<td>{{ $value->ma_lop }}</td>
							
							<td class="text-center"><a href="{{ url('/thongtingiangday/sua/' . $value->id) }}"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/thongtingiangday/xoa/' . $value->id) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection