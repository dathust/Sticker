<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Kichco extends Model {

	protected $table = 'kichcos';

	protected $fillable = ['Kichco','idLoaigiay'];

	public $timestamps = false;

	public function loaigiay()
	{
		return $this->belongTo('App\Loaigiay');
	}

}
