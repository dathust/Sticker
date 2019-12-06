<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Hanggiay;
use App\Loaigiay;
use App\Nguoisudung;
use App\Kichco;
class LoaiGiayController extends Controller {

	public function getDanhSach()
	{
		$loaigiay = Loaigiay::orderBy('id','DESC')->get();
		$kichco = Kichco::all();
		
		 // thay cho select trong sqp
		return view('admin.loaigiay.danhsach',['loaigiay'=>$loaigiay,'kichco'=>$kichco]);
	}

	public function getThem()
	{
		$loaigiay = Loaigiay::all();
		$kichco = Kichco::all();
		$hanggiay = Hanggiay::all();
		$user = Nguoisudung::all();
		return view('admin.loaigiay.them',['loaigiay'=>$loaigiay,'kichco'=>$kichco,'hanggiay'=>$hanggiay,'user'=>$user]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
			[
				'Ten' => 'required|min:1|max:50',
				'idHanggiay' =>'required',
				'idNguoisudung' =>'required'
				

			],
			[
				'Ten.required' => 'Bạn chưa nhập tên giày',
				'idHanggiay.required' => 'Bạn chưa chọn hãng giày',
				'idNguoisudung.required' => 'Bạn chưa chọn tên User'
				
			]);

		$loaigiay = new Loaigiay;

		$loaigiay->idHanggiay = $request->idHanggiay;
		$loaigiay->idNguoisudung = $request->idNguoisudung;
		$loaigiay->Ten = $request->Ten;


		if($request->hasFile('Anh'))
		{
			$file = $request->file('Anh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
			{
				return redirect('admin/loaigiay/them')->with('loi','File bạn đăng bị lỗi');
			}

			$name = $file->getClientOriginalName();
			$Anh = str_random(4)."_".$name;
			while (file_exists("upload/loaigiay/".$Anh)) 
			{
				$Anh = str_random(4)."_".$name;
			}
			$file->move("upload/loaigiay",$Anh);
			$loaigiay->Anh = $Anh;
		}
		else
		{
			$loaigiay->Anh = "";
		}
		
		$loaigiay->Gioithieu = $request->Gioithieu;
		$loaigiay->Soluong = $request->Soluong;
		$loaigiay->Gianhap = $request->Gianhap;
		$loaigiay->Giaban = $request->Giaban;
		
		$loaigiay->save();

		$lg = Loaigiay::get();
		$kichco = new Kichco;

		foreach ($lg as $kclg) {
			$kichco->idLoaigiay = $kclg->id;
		}

		$kichco->Kichco = $request->Kichco;
		$kichco->save();

		return redirect('admin/loaigiay/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id)
	{
		$hanggiay = Hanggiay::all();
		$user = Nguoisudung::all();
		$loaigiay = Loaigiay::find($id);
		return view('admin.loaigiay.sua',['loaigiay'=>$loaigiay,'user'=>$user,'hanggiay'=>$hanggiay]);
	}

	public function postSua(Request $request,$id)
	{
		$loaigiay = Loaigiay::find($id);
		$this->validate($request,
			[
				'Ten' => 'required|min:1|max:50',
				'idHanggiay' =>'required',
				'idNguoisudung' =>'required'
				

			],
			[
				'Ten.required' => 'Bạn chưa nhập tên giày',
				'idHanggiay.required' => 'Bạn chưa chọn hãng giày',
				'idNguoisudung.required' => 'Bạn chưa chọn tên User'
				
			]);

		$loaigiay->idHanggiay = $request->idHanggiay;
		$loaigiay->idNguoisudung = $request->idNguoisudung;
		$loaigiay->Ten = $request->Ten;


		if($request->hasFile('Anh'))
		{
			$file = $request->file('Anh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
			{
				return redirect('admin/loaigiay/them')->with('loi','File bạn đăng bị nhầm');
			}

			$name = $file->getClientOriginalName();
			$Anh = str_random(4)."_".$name;
			while (file_exists("upload/loaigiay/".$Anh)) 
			{
				$Anh = str_random(4)."_".$name;
			}
			$file->move("upload/loaigiay",$Anh);
			$loaigiay->Anh = $Anh;
		}
		else
		{
			$loaigiay->Anh = "";
		}
		

		$loaigiay->Soluong = $request->Soluong;
		$loaigiay->Gianhap = $request->Gianhap;
		$loaigiay->Giaban = $request->Giaban;
		
		$loaigiay->save();
		return redirect('admin/loaigiay/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
    {
        $loaigiay = Loaigiay::find($id);
        $loaigiay->delete();

        return redirect('admin/loaigiay/danhsach')->with('thongbao','Xóa thành công');
    }
}
