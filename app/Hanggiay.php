<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hanggiay extends Model {

	protected $table = 'hanggiays';

	protected $fillable = ['id','Ten','Xuatxu'];

	public $timestamps = false;

	public function loaigiay()
	{
		return $this->hasMany('App\Loaigiay');
	}

}
