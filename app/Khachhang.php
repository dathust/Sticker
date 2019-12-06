<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model {

	protected $table = 'khachhangs';

	protected $fillable = ['id','Sodienthoai','password','Hoten','Tinh/Thanhpho','Huyen/Quan','Diachichitiet'];

	public $timestamps = false;

	public function donhang()
	{
		return $this->hasMany('App\Donhang');
	}

}
