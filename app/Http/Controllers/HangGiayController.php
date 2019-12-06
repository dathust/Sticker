<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Hanggiay;

class HangGiayController extends Controller {

	public function getDanhSach()
	{
		$hanggiay = Hanggiay::all(); // thay cho select trong sqp
		return view('admin.hanggiay.danhsach',['hanggiay'=>$hanggiay]);
	}

	public function getThem()
	{
		return view('admin.hanggiay.them');
	}

	public function postThem(Request $request)
	{
		//bắt ngoại lệ
		$this->validate($request,
			[
				'Ten' => 'required|min:1|max:10|unique:hanggiays,ten'
			],
			[
				'Ten.required' => 'Bạn chưa nhập tên Hãng',
				'Ten.unique'=>'Tên hãng đã tồn tại',
				'Ten.min' => 'Tên hãng phải có ít nhất 1 ký tự và nhiều nhất 10 ký tự',
				'Ten.max' => 'Tên hãng phải có ít nhất 1 ký tự và nhiều nhất 10 ký tự'
			]);

		$hanggiay = new Hanggiay;
		$hanggiay->Ten = $request->Ten;
		$hanggiay->Xuatxu = $request->Xuatxu;
		$hanggiay->save();
		return redirect('admin/hanggiay/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id)
	{
		$hanggiay = Hanggiay::find($id);
		return view('admin.hanggiay.sua',['hanggiay'=>$hanggiay]);
	}

	public function postSua(Request $request,$id)
	{
		$hanggiay = Hanggiay::find($id);
		$this->validate($request,
			[
				'Ten' => 'required|min:1|max:10|unique:hanggiays,ten'
			],
			[
				'Ten.required' => 'Bạn chưa nhập tên thể loại',
				'Ten.min' => 'Tên hãng phải có ít nhất 1 ký tự và nhiều nhất 10 ký tự',
				'Ten.max' => 'Tên hãng phải có ít nhất 1 ký tự và nhiều nhất 10 ký tự',
			]);
		$hanggiay->Ten = $request->Ten;
		$hanggiay->Xuatxu = $request->Xuatxu;
		$hanggiay->save();
		return redirect('admin/hanggiay/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
    {
        $hanggiay = Hanggiay::find($id);

        $hanggiay->delete();

        return redirect('admin/hanggiay/danhsach')->with('thongbao','Xóa thành công');
    }
}
