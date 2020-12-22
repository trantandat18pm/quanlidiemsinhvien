@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header text-center"><h2>Khoa</h2></div>
		<div class="card-body">
			<p><a href="{{ url('/khoa/them') }}" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">#</th>
						<th class="w-10">Mã khoa</th>
						<th>Tên khoa</th>
						
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($khoa as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->makhoa }}</td>
							<td>{{ $value->tenkhoa }}</td>
							
							<td class="text-center"><a href="{{ url('/khoa/sua/' . $value->id) }}"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/khoa/xoa/' . $value->id) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection