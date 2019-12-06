<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	function __construct()
	{
		$this->DangNhap();
	}

	function DangNhap()
	{
		if(Auth::check())
		{
			view()->share('userlogin',Auth::user());
		}
	}

}
