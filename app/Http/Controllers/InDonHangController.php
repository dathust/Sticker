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

class InDonHangController extends Controller {

	public function getPDF($id){

		$khachhang = Khachhang::all();
		$chitietdonhang = Chitietdonhang::all();
		$donhang = Donhang::find($id);
		//$pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		 //$pdf = PDF::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])->loadView('admin.donhang.in',['donhang'=>$donhang,'khachhang'=>$khachhang,'chitietdonhang'=>$chitietdonhang]);
		$pdf = PDF::loadView('admin.donhang.in',['donhang'=>$donhang,'khachhang'=>$khachhang,'chitietdonhang'=>$chitietdonhang])->setPaper('a4');
		//$pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		//$pdf= PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
		//$pdf = convert($csv, "UTF-16LE", "UTF-8");

		//return $pdf->stream('donhang.pdf');
		return view('admin.donhang.in',['donhang'=>$donhang,'khachhang'=>$khachhang,'chitietdonhang'=>$chitietdonhang]);
	}

}
	