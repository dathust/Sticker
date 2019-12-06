<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Loaigiay;
use App\khaosat;
use DB,Cart;

class GoiYController extends Controller {


	public function getgoiy()
	{
		
		return view('user/pages/goiysanpham');
		
	}

	public function postgoiy(Request $request)
	{
		$this->validate($request,
			[
				
				
				

			],
			[
				
				
				
				
			]);
		$sanphamtmp1 = array();
		$i=0;

		$sanphamtmp2 = array();
		$j=0;

		$sanphamtmp3 = array();
		$d=0;

		$gioitinh = $request->Gioitinh;
		$dotuoi = $request->Dotuoi;
		$tinhcach = $request->Tinhcach;
		$chieucao = $request->Chieucao;
		$cannang = $request->Cannang;
		$nghenghiep = $request->Nghenghiep;
		$mausac = $request->Mausac;
		$hoatdong = $request->Hoatdong;

		$sanpham1 = DB::table('khaosats')->join('loaigiays','khaosats.idLoaigiay','=','loaigiays.id',$type = 'inner')->where('Chieucao',$chieucao)->where('Cannang',$cannang)->where('Gioitinh',$gioitinh)->where('Dotuoi',$dotuoi)->where('Nghenghiep',$nghenghiep)->where('Mausac',$mausac)->groupBy('idLoaigiay')->get();

		$sanpham2 = DB::table('khaosats')->join('loaigiays','khaosats.idLoaigiay','=','loaigiays.id',$type = 'inner')->where('Chieucao',$chieucao)->where('Cannang',$cannang)->where('Gioitinh',$gioitinh)->where('Dotuoi',$dotuoi)->groupBy('idLoaigiay')->get();

		$sanpham3 = DB::table('khaosats')->join('loaigiays','khaosats.idLoaigiay','=','loaigiays.id',$type = 'inner')->where('Chieucao',$chieucao)->where('Cannang',$cannang)->where('Gioitinh',$gioitinh)->groupBy('idLoaigiay')->get();

		$sanpham4 = DB::table('khaosats')->join('loaigiays','khaosats.idLoaigiay','=','loaigiays.id',$type = 'inner')->where('Chieucao',$chieucao)->where('Cannang',$cannang)->groupBy('idLoaigiay')->get();

		//Loại bỏ sản phẩm trùng nhau
		foreach ($sanpham2 as $sp2) {
			foreach ($sanpham1 as $sp1) {
				if ($sp2->idLoaigiay==$sp1->idLoaigiay) {
					$i++;
				}
			}
			if ($i==0) {
				array_push($sanphamtmp1, $sp2->idLoaigiay);
			}
			$i=0;
		}

		foreach ($sanpham3 as $sp3) {
			foreach ($sanphamtmp1 as $sp1) {
				if ($sp3->idLoaigiay==$sp1) {
					$j++;
				}
			}
			if ($j==0) {
				array_push($sanphamtmp2, $sp3->idLoaigiay);
			}
			$j=0;
		}

		foreach ($sanpham4 as $sp4) {
			foreach ($sanphamtmp2 as $sp2) {
				if ($sp4->idLoaigiay==$sp2) {
					$d++;
				}
			}
			if ($d==0) {
				array_push($sanphamtmp3, $sp4->idLoaigiay);
			}
			$d=0;
		}

		return view('user/pages/sanphamgoiy',compact('sanpham1','sanphamtmp1','sanphamtmp2','sanphamtmp3'));

	}

}