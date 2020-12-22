<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    protected $table = 'giangvien';
    protected $keyType = 'string';
    public function Khoa()
	{
		return $this->belongsTo('App\Khoa');
	}
}
