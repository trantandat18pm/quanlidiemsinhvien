<?php

namespace App\Imports;

use App\NguoiDung;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
class NguoiDungImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nguoidung([
			'name' => $row['ho_ten'],
			'username' => $row['ma_sinh_vien'],
			'email' => $row['ma_sinh_vien']."@gmail.com",
			'password' =>Hash::make('12345'),
			'quyenhan' => '3',
		]);
    }
    public function headingRow(): int
	{
		return 1;
	}
}
