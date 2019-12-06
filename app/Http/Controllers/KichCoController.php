<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Loaigiay;
use App\Kichco;

class KichCoController extends Controller {

	public function getDanhSach()
	{
		$kichco = Kichco::all(); // thay cho select trong sqp
		return view('admin.kichco.danhsach',['kichco'=>$kichco]);
	}

	public function getThem()
	{
		$loaigiay = Loaigiay::all();
		$kichco = Kichco::all();
		return view('admin.kichco.them',['loaigiay'=>$loaigiay]);
	}

	public function postThem(Request $request)
	{
		//bắt ngoại lệ
		$this->validate($request,
			[
				
			],
			[
				
			]);

		$kichco = new Kichco;
		$kichco->idLoaigiay = $request->idLoaigiay;
		$kichco->Kichco = $request->Kichco;
		$kichco->save();
		return redirect('admin/kichco/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id)
	{
		$kichco = Kichco::find($id);
		$loaigiay = Loaigiay::all();
		return view('admin.kichco.sua',['kichco'=>$kichco,'loaigiay'=>$loaigiay]);
	}

	public function postSua(Request $request,$id)
	{
		$kichco = Kichco::find($id);
		$this->validate($request,
			[
				
			],
			[
				
			]);
		$kichco->idLoaigiay = $request->idLoaigiay;
		$kichco->Kichco = $request->Kichco;
		$kichco->save();
		return redirect('admin/kichco/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
    {
        $kichco = Kichco::find($id);

        $kichco->delete();

        return redirect('admin/kichco/danhsach')->with('thongbao','Xóa thành công');
    }
}
