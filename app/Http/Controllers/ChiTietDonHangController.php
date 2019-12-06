<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Hanggiay;
use App\Loaigiay;
use App\Nguuoisudung;
use App\Donhang;
use App\Chitietdonhang;
class ChiTietDonHangController extends Controller {

	public function getDanhSach()
	{
		$chitietdonhang = chitietdonhang::orderBy('id','DESC')->get(); // thay cho select trong sqp
		return view('admin.chitietdonhang.danhsach',['chitietdonhang'=>$chitietdonhang]);
	}

	public function getThem()
	{
		$donhang = Donhang::all();
		$loaigiay = Loaigiay::all();
		$chitietdonhang = Chitietdonhang::all();
		
		return view('admin.chitietdonhang.them',['chitietdonhang'=>$chitietdonhang,'donhang'=>$donhang,'loaigiay'=>$loaigiay]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
			[
				
				'idDonhang' =>'required'
				
				

			],
			[
				
				'idDonhang.required' => 'Bạn chưa chọn mã đơn hàng',
				
				
			]);
		
		$chitietdonhang = new Chitietdonhang;
		$chitietdonhang->idLoaigiay = $request->idLoaigiay;
		$chitietdonhang->Giatien =$request->Giaban * $request->Soluong;
		
		$chitietdonhang->Soluong = $request->Soluong;
		$chitietdonhang->idDonhang = $request->idDonhang;
		
		
		
		$chitietdonhang->save();
		return redirect('admin/chitietdonhang/them')->with('thongbao','Thêm thành công');
	}


	public function getSua($id)
	{
		$donhang = Donhang::all();
		$loaigiay = Loaigiay::all();
		$chitietdonhang = Chitietdonhang::find($id);
		
		$chitietdonhang = Chitietdonhang::find($id);
		return view('admin.chitietdonhang.sua',['chitietdonhang'=>$chitietdonhang,'donhang'=>$donhang,'loaigiay'=>$loaigiay]);
	}

	public function postSua(Request $request,$id)
	{
		$chitietdonhang = Chitietdonhang::find($id);
		$this->validate($request,
			[
				
				'idDonhang' =>'required'
				
				

			],
			[
				
				'idDonhang.required' => 'Bạn chưa chọn hãng giày',
				
				
			]);

	
		
		$chitietdonhang->idLoaigiay = $request->idLoaigiay;
		
		$chitietdonhang->Giatien =$request->Giaban * $request->Soluong;
		$chitietdonhang->Soluong = $request->Soluong;
		$chitietdonhang->idDonhang = $request->idDonhang;
		
		
		$chitietdonhang->save();
		return redirect('admin/chitietdonhang/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
    {
        $chitietdonhang = chitietdonhang::find($id);
        $chitietdonhang->delete();

        return redirect('admin/chitietdonhang/danhsach')->with('thongbao','Xóa thành công');
    }
}
