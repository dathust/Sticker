<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
 
// Route::get('test',function(){
// 	return view('admin.thongke.test')
// }); 
Route::get('admin/dangnhap','UserController@getdangnhapAdmin');
Route::post('admin/dangnhap','UserController@postdangnhapAdmin');

Route::get('admin/logout','UserController@getdangxuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'hanggiay'],function(){
		//admin/hanggiay/danhsach
		Route::get('danhsach','HangGiayController@getDanhSach');

		Route::get('sua/{id}','HangGiayController@getSua');
		Route::post('sua/{id}','HangGiayController@postSua');

		Route::get('them','HangGiayController@getThem');
		Route::post('them','HangGiayController@postThem');

		Route::get('xoa/{id}','HangGiayController@getXoa');
		
		
	});

	Route::group(['prefix'=>'user'],function(){
		//admin/khachhang/danhsach
		Route::get('danhsach','NguoiDungController@getDanhSach');

		Route::get('sua/{id}','NguoiDungController@getSua');
		Route::post('sua/{id}','NguoiDungController@postSua');

		Route::get('them','NguoiDungController@getThem');
		Route::post('them','NguoiDungController@postThem');

		Route::get('xoa/{id}','NguoiDungController@getXoa');
		
	});

	Route::group(['prefix'=>'loaigiay'],function(){
		//admin/hanggiay/danhsach
		Route::get('danhsach','LoaiGiayController@getDanhSach');

		Route::get('sua/{id}','LoaiGiayController@getSua');
		Route::post('sua/{id}','LoaiGiayController@postSua');

		Route::get('them','LoaiGiayController@getThem');
		Route::post('them','LoaiGiayController@postThem');

		Route::get('xoa/{id}','LoaiGiayController@getXoa');
		
	});

	Route::group(['prefix'=>'kichco'],function(){
		//admin/hanggiay/danhsach
		Route::get('danhsach','KichCoController@getDanhSach');

		Route::get('sua/{id}','KichCoController@getSua');
		Route::post('sua/{id}','KichCoController@postSua');

		Route::get('them','KichCoController@getThem');
		Route::post('them','KichCoController@postThem');

		Route::get('xoa/{id}','KichCoController@getXoa');
		
	});

	Route::group(['prefix'=>'khachhang'],function(){
		//admin/khachhang/danhsach
		Route::get('danhsach','KhachHangController@getDanhSach');

		Route::get('sua/{id}','KhachHangController@getSua');
		Route::post('sua/{id}','KhachHangController@postSua');

		Route::get('them','KhachHangController@getThem');
		Route::post('them','KhachHangController@postThem');

		Route::get('xoa/{id}','KhachHangController@getXoa');
		
	});
	Route::group(['prefix'=>'donhang'],function(){
		//admin/theloai/danhsach
		Route::get('danhsach','DonHangController@getDanhSach');

		Route::get('sua/{id}','DonHangController@getSua');
		Route::post('sua/{id}','DonHangController@postSua');

		Route::get('them','DonHangController@getThem');
		Route::post('them','DonHangController@postThem');

		Route::get('xoa/{id}','DonHangController@getXoa');
		
		Route::get('in/{id}','InDonHangController@getPDF');

		Route::get('indh/{id}','InDHController@getprint');
		
	});

	Route::group(['prefix'=>'chitietdonhang'],function(){
		//admin/theloai/danhsach
		Route::get('danhsach','ChiTietDonHangController@getDanhSach');

		Route::get('sua/{id}','ChiTietDonHangController@getSua');
		Route::post('sua/{id}','ChiTietDonHangController@postSua');

		Route::get('them','ChiTietDonHangController@getThem');
		Route::post('them','ChiTietDonHangController@postThem');

		Route::get('xoa/{id}','ChiTietDonHangController@getXoa');
		
	});

	Route::group(['prefix'=>'thongke'],function(){
		//admin/theloai/danhsach
		Route::get('sanpham','ThongKeController@getSanPham');
		
	});
	Route::group(['prefix'=>'user1'],function(){
		//admin/khachhang/danhsach
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');
		
	});
	Route::group(['prefix'=>'thongkesanpham'],function(){
		//admin/theloai/danhsach
		Route::get('sanpham','ThongKeController@thongkeSanPham');
		
	});

});

Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham']);

Route::get('chi-tiet-san-pham/{id}/{idTheloai}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham']);

Route::post('tim-kiem','TimKiemController@timkiem');

Route::get('mua-hang/{id}',['as'=>'muahang','uses'=>'WelcomeController@muahang']);

Route::get('gio-hang',['as'=>'giohang','uses'=>'WelcomeController@giohang']);

Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'WelcomeController@xoasanpham']);

Route::get('cap-nhat/{id}/{qty}/{kt}',['as'=>'capnhat','uses'=>'WelcomeController@capnhat']);

Route::get('thanh-toan',['as'=>'thanhtoan','uses'=>'WelcomeController@thanhtoan']);

Route::get('khao-sat',['as'=>'khaosat','uses'=>'KhaoSatController@getkhaosat']);

Route::post('khao-sat',['as'=>'khaosat','uses'=>'KhaoSatController@postkhaosat']);

Route::get('goi-y-sanpham',['as'=>'goiy','uses'=>'GoiYController@getgoiy']);

Route::post('goi-y-sanpham',['as'=>'goiy','uses'=>'GoiYController@postgoiy']);

Route::post('dat-mua','DatMuaController@datmua');




