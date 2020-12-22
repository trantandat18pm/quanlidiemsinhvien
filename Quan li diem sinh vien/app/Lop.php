<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
	protected $table = 'lop';
	protected $keyType = 'string';
	protected $fillable = [
		'id', 'malop', 'khoa_id', 'tenlop'
	];
	
	public function SinhVien()
	{
		return $this->hasMany('App\SinhVien');
	}
	
	public function Khoa()
	{
		return $this->belongsTo('App\Khoa');
	}
}