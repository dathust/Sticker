<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Nguoisudung;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Hanggiay;
class NguoiDungController extends Controller {

	public function getDanhSach()
	{
		$user = Nguoisudung::all(); // thay cho select trong sqp
		return view('admin.user.danhsach',['user'=>$user]);
	}

	public function getThem()
	{
		return view('admin.user.them');
	}

	public function postThem(Request $request)
	{
		//bắt ngoại lệ
		$this->validate($request,
			[
				'Sodienthoai' => 'required|min:1|max:10|unique:nguoisudungs,Sodienthoai',
				'password' => 'required|min:1|max:50',
				'Hoten' => 'required|min:1|max:50',
				'passwordAgain' => 'required|same:password',
				
			],
			[
				'Sodienthoai.required' => 'Bạn chưa nhập tài khoản',
				
				'Sodienthoai.min' => 'Tên tài khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Sodienthoai.max' => 'Tên tài khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				
				'password.required' => 'Bạn chưa nhập mật khẩu',				
				'password.min' => 'Mật khẩu phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'password.max' => 'Mật khẩu khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Hoten.required' => 'Bạn chưa nhập tên',				
				'Hoten.min' => 'Tên bạn phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Hoten.max' => 'Tên bạn khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
				'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
			]);

		$user = new Nguoisudung;
		$user1 = new User;
		$user->Sodienthoai = $request->Sodienthoai;
		$user1->Sodienthoai = $request->Sodienthoai;
		//$user->password =$request->password;
		$user->password =bcrypt($request->password);
		$user1->password =bcrypt($request->password);
		$user->Hoten = $request->Hoten;
		$user1->Hoten = $request->Hoten;
		$user->Diachi = $request->Diachi;
		$user1->Diachi = $request->Diachi;
		$user->Quyen = $request->Quyen;
		$user1->Quyen = $request->Quyen;
		$user->save();
		$user1->save();
		return redirect('admin/user/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id)
	{
		$user = Nguoisudung::find($id);
		return view('admin.user.sua',['user'=>$user]);
	}

	public function postSua(Request $request,$id)
	{
		$user = Nguoisudung::find($id);
		$this->validate($request,
			[
				'Sodienthoai' => 'required|min:1|max:50',
				'password' => 'required|min:1|max:50',
				'Hoten' => 'required|min:1|max:50',
				'passwordAgain' => 'required|same:password',
				'email' => 'min:1|max:50|email'
				
			],
			[
				'Sodienthoai.required' => 'Bạn chưa nhập tài khoản',
				
				'Sodienthoai.min' => 'Tên tài khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Sodienthoai.max' => 'Tên tài khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'email.email' => 'Đinh dạng email bị sai',
				'password.required' => 'Bạn chưa nhập mật khẩu',				
				'password.min' => 'Mật khẩu phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'password.max' => 'Mật khẩu khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Hoten.required' => 'Bạn chưa nhập tên',				
				'Hoten.min' => 'Tên bạn phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'Hoten.max' => 'Tên bạn khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
				'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
			]);

		$user->Sodienthoai = $request->Sodienthoai;
		$user->password =bcrypt($request->password) ;
		$user->Hoten = $request->Hoten;
		$user->Diachi = $request->Diachi;
		$user->Quyen = $request->Quyen;
		$user->save();
		return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
    {
        $user = Nguoisudung::find($id);
        $user->delete();

        return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    }


   
   
}
