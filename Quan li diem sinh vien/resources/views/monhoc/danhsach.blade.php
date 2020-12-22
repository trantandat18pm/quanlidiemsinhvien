@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header text-center"><h2>Môn Học</h2></div>
		<div class="card-body">
			<p><a href="{{ url('/monhoc/them') }}" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">#</th>
						<th class="w-10">Mã Môn học</th>
						<th>Tên môn học</th>
						<th class="w-10">Số tín chỉ</th>
						<th>Học kì</th>
								
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($mon_hoc as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->mamon }}</td>
							<td>{{ $value->tenmh }}</td>
							<td>{{ $value->sotc }}</td>
							<td>{{ $value->hocki }}</td>
						
							<td class="text-center"><a href="{{ url('/monhoc/sua/' . $value->id) }}"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/monhoc/xoa/' . $value->id) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection