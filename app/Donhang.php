<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model {
protected $table = 'donhangs';

	protected $fillable = ['Thoigiangui','Thoigiannhan','Soluong','Tongthu','Ghichu','TinhThanhpho','HuyenQuan','Diachichitiet','idKhachhang'];

	public $timestamps = false;

	public function khachhang()
	{
		return $this->belongsTo('App\Khachhang');
	}

	public function chitietdonhang()
	{
		return $this->hasMany('App\Chitietdonhang');
	}


}
