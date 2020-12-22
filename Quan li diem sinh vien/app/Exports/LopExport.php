<?php

namespace App\Exports;

use App\SinhVien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SinhVienExport implements FromCollection, WithHeadings
{
	public function headings(): array
	{
		return [
			'Mã sinh viên',
			'Mã lớp',
			'Họ tên',			
			'Ngày sinh',
			'Điện thoại',
			'Email',
			'Ghi chú',
		];
	}
	
	public function collection()
	{
		return SinhVien::all('id', 'lop_id', 'hoten', 'ngaysinh', 'dienthoai', 'email', 'ghichu');
	}
}