<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Hanggiay;
use App\Donhang;
use App\Loaigiay;
use App\Chitietdonhang;
use Carbon\Carbon;
use DB;



class TimKiemController extends Controller {

	public function timkiem(Request $request)
	{
		$tukhoa = $request->tukhoa;
		$sanpham1 = Loaigiay::where('Ten','like',"%$tukhoa%")->orWhere('Gioithieu','like',"%$tukhoa")->get();

		return view('user/pages/timkiem',['tukhoa'=>$tukhoa,'sanpham1'=>$sanpham1]);
	}

	
}
