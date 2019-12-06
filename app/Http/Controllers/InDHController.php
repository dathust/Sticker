<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Khachhang;
use App\Chitietdonhang;
use App\Donhang;
use DB,Cart;
use PDF;

class InDHController extends Controller {

	public function getprint($id){

		$khachhang = Khachhang::all();
		$chitietdonhang = Chitietdonhang::all();
		$donhang = Donhang::find($id);

		return view('admin.donhang.indh',['donhang'=>$donhang,'khachhang'=>$khachhang,'chitietdonhang'=>$chitietdonhang]);
	}

}
	