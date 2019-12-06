<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class khaosat extends Model {

	protected $table = 'khaosats';

	protected $fillable = ['idLoaigiay','Gioitinh','Dotuoi','Tinhcach','Chieucao','Cannang','Nghenghiep','Mausac','Hoatdong'];

	public $timestamps = false;

	public function loaigiay()
	{
		return $this->hasMany('App\Loaigiay');
	}


}
