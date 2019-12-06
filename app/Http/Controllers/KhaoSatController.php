<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Loaigiay;
use App\Khaosat;
use DB,Cart;

class KhaoSatController extends Controller {


	public function getkhaosat()
	{
		$content = Cart::content();
		
		$total = Cart::total();
		return view('user/pages/khaosat',compact('content','total'));
		
	}

	public function postkhaosat(Request $request)
	{
		$this->validate($request,
			[
			],
			[
			]);
	$content = Cart::content();
	$total = Cart::total();

	foreach ($content as $item) {
		

	$khaosat = new Khaosat;
	//vòng lặp cho từng loại giày khác nhau.
	$khaosat->idLoaigiay = $item->id;
	$khaosat->Gioitinh = $request->Gioitinh;
	$khaosat->Dotuoi = $request->Dotuoi;
	$khaosat->Tinhcach = $request->Tinhcach;
	$khaosat->Chieucao = $request->Chieucao;
	$khaosat->Cannang = $request->Cannang;
	$khaosat->Nghenghiep = $request->Nghenghiep;
	$khaosat->Mausac = $request->Mausac;
	$khaosat->Hoatdong = $request->Hoatdong;
	
	$khaosat->save();
	}
	$tmp=1;
		return view('user/pages/thanhtoan',compact('content','total','tmp'));
	
	}
}