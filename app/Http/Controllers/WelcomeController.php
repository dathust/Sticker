<?php namespace App\Http\Controllers;

use DB,Cart;
use Request;
use App\Khachhang;
use App\Loaigiay;
use App\Kichco;
use App\Hanggiay;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$product = DB::table('loaigiays')->select('id','Ten','Anh','Gioithieu','Soluong','Giaban','idHanggiay')->orderBy('id','DESC')->take(16)->get();
		
		return view('user.pages.home',['product'=>$product]);
	}

	public function loaisanpham($id)
	{
		$product_cate = DB::table('loaigiays')->select('id','Ten','Anh','Soluong','Giaban','idHanggiay')->where('idHanggiay',$id)->paginate(9);
		$cate = DB::table('hanggiays')->select('id','Ten')->get();
		// $productbest = DB::table('sanpham')->select('id','Ten','Anh','Soluong','Giaban','idHanggiay')->where()->take(3)->get();
		$productlast = DB::table('loaigiays')->select('id','Ten','Anh','Soluong','Giaban','idHanggiay')->orderBy('id','DESC')->take(3)->get();
		return view('user.pages.hanggiay',compact('product_cate','cate','productlast'));
	}

	public function chitietsanpham($id,$idHanggiay)
	{
		$product_detail = DB::table('loaigiays')->where('id',$id)->first();
		$product_cate = DB::table('loaigiays')->select('id','Ten','Anh','Soluong','Giaban','idHanggiay')->where('idHanggiay',$idHanggiay)->where('id','<>',$id)->take(4)->get();
		
		return view('user.pages.chitietsanpham',compact('product_detail','product_cate'));
	}

	public function timkiem(Request $request)
	{
		$tukhoa = $request->tukhoa;
		$sanpham1 = Loaigiay::where('Ten','like',"%$tukhoa")->orWhere('Gioithieu','like',"%$tukhoa")->get();
		$sanpham2 = Hanggiay::where('Ten','like',"%$tukhoa")->get();

		return view('user/pages/timkiem',['tukhoa'=>$tukhoa,'sanpham1'=>$sanpham1,'sanpham2'=>$sanpham2]);
	}


	public function muahang($id)
	{
		$product_buy = DB::table('loaigiays')->where('id',$id)->first();
		
		Cart::add(array('id'=>$id,'name'=>$product_buy->Ten,'qty'=>1,'price'=>$product_buy->Giaban,'options'=>['Anh'=>$product_buy->Anh,'Kt'=>0]));
		$content = Cart::content();
		return redirect()->route('giohang');
	}

	public function giohang()
	{
		$content = Cart::content();
		
		$total = Cart::total();

		

		return view('user/pages/giohang',compact('content','total'));
	}

	public function xoasanpham($id)
	{
		Cart::remove($id);
		return redirect()->route('giohang');

	}

	public function capnhat( Request $request)
	{
		if (Request::ajax()) {
			$id = Request::get('id');
			$qty = Request::get('qty');
			$kt = Request::get('kt');
			
			Cart::update($id,['qty'=>$qty,"options"=>['Kt'=>$kt]]);
			return "oke";
			
		}
	}

	public function thanhtoan(){
		$content = Cart::content();
		$total = Cart::total();
		$tmp=0;
		return view('user/pages/thanhtoan',compact('content','total','tmp'));
	}

	public function khaosat(){
		
		return view('user/pages/khaosat',compact('content','total'));
	}

	public function postkhaosat(Request $request){
		
		$this->validate($request,
			[
			],
			[
			]);
	$content = Cart::content();
	$total = Cart::total();

	foreach ($content as $item) {
		$khaosat = new khaosat;
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
	}
	
	$khaosat->save();
	return redirect('khao-sat')->with('thongbao','Hoàn thành khảo sát');
	}


}
