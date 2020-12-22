@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header text-center"><h2>NGƯỜI DÙNG</h2></div>
		<div class="card-body">
		<!-- 	<p><a href="{{ url('/lop/them') }}" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p> -->
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">#</th>
						<th class="w-10">Họ tên</th>
						<th>Username</th>
						<th>Quyền hạn</th>
						<th>Hình Ảnh</th>
						<th class="w-5">Sửa</th>
						

					</tr>
				</thead>
				<tbody>
					@foreach($nguoidung as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->username }}</td>
							<td >
							@if($value->quyenhan==1)
								Admin
							@elseif($value->quyenhan==2)
									Giảng viên
							@elseif($value->quyenhan==3)
									Sinh viên		
							@endif
							</td>
							<td>
								@if(($value->hinhanh)=="")
								<img src="{{ asset('public/images/defaut.png')}}" class="brand-image img-circle elevation-3" style="width: 50px;height: 50px;">
								@else							
								<img src="{{ $value->hinhanh }}" class="brand-image img-circle elevation-3" style="width: 50px;height: 50px;">
								@endif
							</td>
							<td class="text-center"><a href="{{ url('/nguoidung/sua/' . $value->id) }}"><i class="fal fa-edit"></i></a></td>
						
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection