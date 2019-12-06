<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Nguoisudung;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Hanggiay;
class UserController extends Controller {

	public function getDanhSach()
	{
		$user = User::all(); // thay cho select trong sqp
		return view('admin.user1.danhsach',['user'=>$user]);
	}

	public function getThem()
	{
		return view('admin.user1.them');
	}

	public function postThem(Request $request)
	{
		//bắt ngoại lệ
		$this->validate($request,
			[
				'acc' => 'required|min:1|max:10|unique:users,acc',
				'password' => 'required|min:1|max:50',
				
				'passwordAgain' => 'required|same:password'
				
			],
			[
				'acc.required' => 'Bạn chưa nhập tài khoản',
				
				'acc.min' => 'Tên tài khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'acc.max' => 'Tên tài khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				
				'password.required' => 'Bạn chưa nhập mật khẩu',				
				'password.min' => 'Mật khẩu phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'password.max' => 'Mật khẩu khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				
				'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
				'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
			]);

		$user = new User;
		$user->acc = $request->acc;
		//$user->password =$request->password;
		$user->password =bcrypt($request->password) ;
		
		$user->quyen = $request->quyen;
		$user->save();
		return redirect('admin/user1/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id)
	{
		$user = user::find($id);
		return view('admin.user1.sua',['user'=>$user]);
	}

	public function postSua(Request $request,$id)
	{
		$user = user::find($id);
		$this->validate($request,
			[
				'acc' => 'required|min:1|max:50',
				'password' => 'required|min:1|max:50',
				
				'passwordAgain' => 'required|same:password',
				'email' => 'min:1|max:50|email'
				
			],
			[
				'acc.required' => 'Bạn chưa nhập tài khoản',
				
				'acc.min' => 'Tên tài khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'acc.max' => 'Tên tài khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'email.email' => 'Đinh dạng email bị sai',
				'password.required' => 'Bạn chưa nhập mật khẩu',				
				'password.min' => 'Mật khẩu phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				'password.max' => 'Mật khẩu khoản phải có ít nhất 1 ký tự và nhiều nhất 50 ký tự',
				
				'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
				'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
			]);

		$user->acc = $request->acc;
		$user->password =bcrypt($request->password) ;
		$user->quyen = $request->quyen;
		$user->save();
		return redirect('admin/user1/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
    {
        $user = user::find($id);
        $user->delete();

        return redirect('admin/user1/danhsach')->with('thongbao','Xóa thành công');
    }

	
	public function getdangnhapAdmin()
    {
    	return view('admin.login');
    }

    public function postdangnhapAdmin(Request $request)
    {
    	$this->validate($request,
    		[
    			'Sodienthoai' => 'required',
				'password' => 'required'
    		],
    		[	'Sodienthoai.required' => 'Bạn chưa nhập tài khoản',
    			
				
				'password.required' => 'Bạn chưa nhập mật khẩu'				
				
    		]);
    	if(Auth::attempt(['Sodienthoai'=>$request->Sodienthoai,'password'=>$request->password]))
    	{
    		return redirect('admin/hanggiay/danhsach');
    	}
    	else
    	{
    		return redirect('admin/dangnhap')->with('thongbao','Sai tài khoản hoặc mật khẩu');
    	}
    }

     public function getdangxuatAdmin()
    {	
    	Auth::logout();
    	return view('admin.login');
    }
   
}
