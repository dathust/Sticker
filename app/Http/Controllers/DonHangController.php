<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Hanggiay;
use App\Loaigiay;
use App\Nguoisudung;
use App\Khachhang;
use App\Donhang;
use App\Kichco;
use App\Chitietdonhang;
class DonHangController extends Controller {

	public function getDanhSach()
	{
		$donhang = donhang::orderBy('id','DESC')->get(); // thay cho select trong sqp
		return view('admin.donhang.danhsach',['donhang'=>$donhang]);
	}

	public function getThem()
	{
		$khachhang = Khachhang::all();
		$chitietdonhang = Chitietdonhang::all();
		
		return view('admin.donhang.them',['khachhang'=>$khachhang,'chitietdonhang'=>$chitietdonhang]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
			[
				
				
				
				

			],
			[
				
				
				
				
			]);

		$donhang = new Donhang;
		$donhang->Thoigiangui = $request->Thoigiangui;
		$donhang->Thoigiannhan = $request->Thoigiannhan;
		$donhang->Soluong = $request->Soluong;
		$donhang->Tongthu = $request->Tongthu;
		$donhang->Ghichu = $request->Ghichu;
		$donhang->TinhThanhpho = $request->TinhThanhpho;
		$donhang->HuyenQuan = $request->HuyenQuan;
		$donhang->Diachichitiet = $request->Diachichitiet;
		$donhang->idKhachhang = $request->idKhachhang;

		
		
		$donhang->save();
		return redirect('admin/donhang/them')->with('thongbao','Thêm thành công');
	}


	public function getSua($id)
	{
		$khachhang = Khachhang::all();
		
		$donhang = Donhang::find($id);
		return view('admin.donhang.sua',['donhang'=>$donhang,'khachhang'=>$khachhang]);
	}

	public function postSua(Request $request,$id)
	{
		$donhang = Donhang::find($id);
		$this->validate($request,
			[
				
				
				
				

			],
			[
				
				
				
				
			]);
	
		
		$donhang->Thoigiangui = $request->Thoigiangui;
		$donhang->Thoigiannhan = $request->Thoigiannhan;
		$donhang->Soluong = $request->Soluong;
		$donhang->Tongthu = $request->Tongthu;
		$donhang->Ghichu = $request->Ghichu;
		$donhang->TinhThanhpho = $request->TinhThanhpho;
		$donhang->HuyenQuan = $request->HuyenQuan;
		$donhang->Diachichitiet = $request->Diachichitiet;
		$donhang->save();
		return redirect('admin/donhang/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
    {
        $donhang = donhang::find($id);
        $donhang->delete();

        return redirect('admin/donhang/danhsach')->with('thongbao','Xóa thành công');
    }
}
