<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Hanggiay;
use App\Donhang;
use App\Loaigiay;
use App\Chitietdonhang;
use Carbon\Carbon;
use DB;



class ThongKeController extends Controller {

	public function getSanPham()
	{
		
		$donhang = Donhang::all();
		$hanggiay = Hanggiay::all();
		$chitietdonhang = Chitietdonhang::all();
		$month = array();
		$id = array();
		$thang = array(1,2,3,4,5,6,7,8,9,10,11,12);
				//array_push($month, 4,5,6)
		
		foreach ($donhang as $dh) {
			$dt = Carbon::parse($dh->Thoigiangui);
			$dt1 = $dt->month;
			$iddh = $dh->id;
			array_push($month, $dt1);
			array_push($id, $iddh);
		}
		
	

  

		return view('admin.thongke.sanpham1',['donhang'=>$donhang,'month'=>$month,'id'=>$id,'thang'=>$thang,'chitietdonhang'=>$chitietdonhang]);
	}

	
}
