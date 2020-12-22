<?php

namespace App\Imports;

use App\SinhVien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SinhVienImport implements ToModel, WithHeadingRow
{
	public function model(array $row)
	{
		return new SinhVien([
			'masv' => $row['ma_sinh_vien'],
			'lop_id' => $row['ma_lop'],
			'hoten' => $row['ho_ten'],
			'ngaysinh' => $row['nam_sinh'],
			'dienthoai' => $row['dien_thoai'],
			'email' => $row['ma_sinh_vien']."@gmail.com",
			'ghichu' => $row['ghi_chu'],
		]);
		
		// return new Nguoidung([
		// 	'name' => $row['ho_ten'],
		// 	'username' => $row['ma_sinh_vien'],
		// 	'email' => $row['email'],
		// 	'password' => $row['ma_lop'],
		// 	'quyenhan' => '1',
		// ]);
	}
	
	public function headingRow(): int
	{
		return 1;
	}
}