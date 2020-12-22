<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinGiangDay extends Model
{
    protected $table = 'thongtingiangday';
    protected $keyType = 'string';
    protected $fillable = [
		'ma_gv', 'ma_mh', 'ma_lop'
  ];
  public function Giangvien()
	{
		return $this->belongsTo('App\Giangvien');
  }
  public function MonHoc()
	{
		return $this->belongsTo('App\MonHoc');
  }
  public function Lop()
	{
		return $this->belongsTo('App\Lop');
  }
  
}
