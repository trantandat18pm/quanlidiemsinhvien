<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
	protected $table = 'sinhvien';
	protected $keyType = 'string';
	
	protected $fillable = [
		'id','masv', 'lop_id', 'hoten', 'ngaysinh','ngaysinh','dienthoai','email','ghichu'
	];
	
	public function Lop()
	{
		return $this->belongsTo('App\Lop');
	}
}