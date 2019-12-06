<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Khachhang;

class KhachHangController extends Controller {

	public function getDanhSach()
	{
		$khachhang = Khachhang::all(); // thay cho select trong sqp
		return view('admin.khachhang.danhsach',['khachhang'=>$khachhang]);
	}

	public function getThem()
	{
		return view('admin.khachhang.them');
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
			[
				'Hoten' => 'required|min:1|max:10',
				'Sodienthoai' => 'required|min:10|max:11',
				

			],
			[
				'Hoten.required' => 'Bạn chưa nhập tên Khách hàng',
				'Hoten.min' => 'Tên Khách phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Hoten.max' => 'Tên Khách phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Sodienthoai.required' => 'Bạn chưa nhập số điện thoại',
				'Sodienthoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự và nhiều nhất 11 ký tự',
				'Sodienthoai.max' => 'Số điện thoại phải có ít nhất 10 ký tự và nhiều nhất 11 ký tự',
				
			]);

		$khachhang = new khachhang;
		$khachhang->Hoten = $request->Hoten;
		$khachhang->Sodienthoai = $request->Sodienthoai;
		$khachhang->password =bcrypt($request->password) ;
		$khachhang->TinhThanhpho = $request->TinhThanhpho;
		$khachhang->HuyenQuan = $request->HuyenQuan;
		$khachhang->Diachichitiet = $request->Diachichitiet;
		
		$khachhang->save();
		return redirect('admin/khachhang/them')->with('thongbao','Thêm thành công');
	}
	public function getSua($id)
	{
		$khachhang = khachhang::find($id);
		return view('admin.khachhang.sua',['khachhang'=>$khachhang]);
	}

	public function postSua(Request $request,$id)
	{
		$khachhang = khachhang::find($id);
		$this->validate($request,
			[
				'Ten' => 'required|min:1|max:10',
				'Sodienthoai' => 'required|required|min:10|max:11',
				'Diachi' => 'required'

			],
			[
				'Ten.required' => 'Bạn chưa nhập tên Khách hàng',
				'Ten.min' => 'Tên Khách phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Ten.max' => 'Tên Khách phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Sodienthoai.required' => 'Bạn chưa nhập số điện thoại',
				'Sodienthoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự và nhiều nhất 11 ký tự',
				'Sodienthoai.max' => 'Số điện thoại phải có ít nhất 10 ký tự và nhiều nhất 11 ký tự',
				'Diachi.required' => 'Bạn chưa nhập địa chỉ'
			]);
		$khachhang = new khachhang;
		$khachhang->Ten = $request->Ten;
		$khachhang->Sodienthoai = $request->Sodienthoai;
		
		$khachhang->Diachi = $request->Diachi;
		$khachhang->Ghichu = $request->Ghichu;
		$khachhang->save();
		return redirect('admin/khachhang/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
    {
        $khachhang = khachhang::find($id);
        $khachhang->delete();

        return redirect('admin/khachhang/danhsach')->with('thongbao','Xóa thành công');
    }


}
	