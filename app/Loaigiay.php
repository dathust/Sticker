<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaigiay extends Model {

	protected $table = 'loaigiays';

	protected $fillable = ['Ten','Anh','Gioithieu','Soluong','Gianhap','Giaban','idHanggiay','idNguoisudung'];

	public $timestamps = false;

	public function hanggiay()
	{
		return $this->belongsTo('App\Hanggiay');
	}

	public function nguoisudung()
	{
		return $this->belongsTo('App\Nguoisudung');
	}

	public function kichco()
	{
		return $this->hasMany('App\Kichco');
	}

	public function chitietdonhang()
	{
		return $this->hasMany('App\Chitietdonhang');
	}
	public function khaosat()
	{
		return $this->hasMany('App\khaosat');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
