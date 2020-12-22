<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = 'mon_hoc';
	protected $keyType = 'string';
	public function Diem()
	{
		return $this->belongsTo('App\Diem');
	}
}
