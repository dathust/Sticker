<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model {

	protected $table = 'chitietdonhangs';

	protected $fillable = ['idLoaigiay','Soluong','Giatien','idDonhang'];

	public $timestamps = false;

	public function loaigiay()
	{
		return $this->hasMany('App\Loaigiay');
	}

	public function donhang()
	{
		return $this->belongsTo('App\Donhang');
	}
}
