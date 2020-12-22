@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header text-center"><h2>Lớp</h2></div>
		<div class="card-body">
			<p><a href="{{ url('/lop/them') }}" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
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
						<th class="w-10">Mã lớp</th>
						<th>Tên lớp</th>
						<th>Khoa</th>
					
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>

					</tr>
				</thead>
				<tbody>
					@foreach($lop as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->malop }}</td>
							<td>{{ $value->tenlop }}</td>
							@foreach($khoa as $k)
							@if($value->khoa_id == $k->makhoa)
								<td>{{ $k->tenkhoa }}</td>
							
							@endif
						@endforeach
							
							<td class="text-center"><a href="{{ url('/lop/sua/' . $value->id) }}"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/lop/xoa/' . $value->id) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection