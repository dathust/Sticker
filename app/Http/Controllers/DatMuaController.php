<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Khachhang;
use App\Chitietdonhang;
use App\Donhang;
use DB,Cart;
use Carbon\Carbon;

class DatMuaController extends Controller {



	public function datmua(Request $request)
	{
		$this->validate($request,
			[
				'Hoten' => 'required|min:1|max:50',
				'Sodienthoai' => 'required|min:10|max:11',
				'TinhThanhpho' => 'required',
				'HuyenQuan' => 'required',
				'Diachi' => 'required',


			],
			[
				'Hoten.required' => 'Bạn chưa nhập tên Khách hàng',
				'Hoten.min' => 'Tên Khách phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Hoten.max' => 'Tên Khách phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Sodienthoai.required' => 'Bạn chưa nhập số điện thoại',
				'Sodienthoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự và nhiều nhất 11 ký tự',
				'Sodienthoai.max' => 'Số điện thoại phải có ít nhất 10 ký tự và nhiều nhất 11 ký tự',
				'TinhThanhpho.required' => 'Bạn chưa nhập địa chỉ'
			]);
		$today = Carbon::today();
		$content = Cart::content();

		$total = Cart::total();

		$khachhang = new Khachhang;

		$khachhang->Hoten = $request->Hoten;
		$khachhang->Sodienthoai = $request->Sodienthoai;
		
		$khachhang->TinhThanhpho = $request->TinhThanhpho;
		$khachhang->HuyenQuan = $request->HuyenQuan;
		$khachhang->Diachichitiet = $request->Diachi;
		$khachhang->save();

		$kh = Khachhang::get();

		$donhang = new Donhang;

		foreach ($kh as $khg) {
			$donhang->idKhachhang = $khg->id;
		}
		
		$donhang->Thoigiangui = $today;
		$donhang->Thoigiannhan ="2017-12-29";
		
		$donhang->Tongthu = $total;
		$donhang->Ghichu = $request->Ghichu;
		$donhang->TinhThanhpho = $request->TinhThanhpho;
		$donhang->HuyenQuan = $request->HuyenQuan;
		$donhang->Diachichitiet = $request->Diachi;
		

		
		$donhang->save();
		
		$dh = Donhang::get();
		foreach ($dh as $dhg) {
			$iddh = $dhg->id;
		}

		

		foreach ($content as $item) {
		$chitietdonhang = new Chitietdonhang;
		$chitietdonhang->idLoaigiay = $item->id;
		$chitietdonhang->Giatien =$item->price * $item->qty;
		
		$chitietdonhang->Soluong = $item->qty;
		$chitietdonhang->idDonhang = $iddh;
		
		
		
		$chitietdonhang->save();
		}
		


		
		return redirect('thanh-toan')->with('thongbao','Thanh toán thành công');
	}

	public function datmua1(Request $request){
		$this->validate($request,
			[
				
				
				

			],
			[
				
				
				
				
			]);
		
		$content = Cart::content();

		$total = Cart::total();
		foreach ($content as $item) {
		$chitietdonhang = new chitietdonhang;
		$chitietdonhang->idTruyen = $item->id;
		$chitietdonhang->Giatien =$item->price * $item->qty;
		
		$chitietdonhang->Soluong = $item->qty;
		$chitietdonhang->idDonhang = 2;
		
		
		
		$chitietdonhang->save();
		}
		
		return redirect('dat-mua1')->with('thongbao','Thêm thành công');
	}
	

}
	