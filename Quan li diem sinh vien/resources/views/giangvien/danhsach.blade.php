@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header text-center"><h2>Giảng viên</h2></div>
		<div class="card-body">
			<p><a href="{{ url('/giangvien/them') }}" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">#</th>
						<th class="w-10">Mã giảng viên</th>
						<th>Tên giảng viên</th>
						<th>Khoa</th>
						
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>

					</tr>
				</thead>
				<tbody>
					@foreach($giangvien as $value)
					
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->magv }}</td>
							<td>{{ $value->tengv }}</td>
							
						@foreach($khoa as $k)
							@if($value->khoa_id == $k->makhoa)
								<td>{{ $k->tenkhoa }}</td>
							
							@endif
						@endforeach
							<td class="text-center"><a href="{{ url('/giangvien/sua/' . $value->id) }}"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/giangvien/xoa/' . $value->id) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
				
				@endforeach
						
				</tbody>
			</table>
		</div>
	</div>
@endsection