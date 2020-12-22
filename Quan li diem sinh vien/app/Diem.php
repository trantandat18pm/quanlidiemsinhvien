<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Diem extends Model
{
    //
    protected $table = 'diem';
	protected $keyType = 'string';
	protected $primaryKey = ['MaSV_id', 'maMH_id'];
	public $incrementing = false;
	protected $fillable = [
		'MaSV_id', 'maMH_id','phan_tram_TX','phan_tram_thi', 'diemTX', 'diemthil1','diemthil2','diemtb','loaidiem','MaGV'
	];

	public function MonHoc()
	{
		return $this->hasMany('App\MonHoc');
	}
	public function SinhVien()
	{
		return $this->hasMany('App\SinhVien');
	}

	protected function setKeysForSaveQuery(Builder $query)
	{
	    foreach ($this->primaryKey as $key) {
	        if (isset($this->$key))
	            $query->where($key, '=', $this->$key);
	        else
	            throw new Exception(__METHOD__ . 'Missing part of the primary key: ' . $key);
	    }
	    return $query;
	}
}
