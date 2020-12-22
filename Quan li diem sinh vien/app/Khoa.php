<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table = 'khoa';
	protected $keyType = 'string';
	
	public function Lop()
	{
		return $this->hasMany('App\Lop');
	}
	public function GiangVien()
	{
		return $this->hasMany('App\GiangVien');
	}
}