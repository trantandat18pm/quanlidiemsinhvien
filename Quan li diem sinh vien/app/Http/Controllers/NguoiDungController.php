<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiDung;
use Carbon\Carbon;
use Auth;
class NguoiDungController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	// Danh sách
	public function getDanhSach()
	{
		$nguoidung = NguoiDung::all();
		
		return view('nguoidung.danhsach', compact('nguoidung'));
	}
	
	// Form thêm
	public function getThem()
	{
		// $khoa = Khoa::all();
		// return view('lop.them',compact('khoa'));
	}
	
	// Xử lý thêm
	public function postThem(Request $request)
	{
		// $request->validate([
		// 	'malop' => 'required|max:8|unique:lop',
		// 	'tenlop' => 'required|max:50',

		// ]);
		
		// $lop = new Lop();
		// $lop->malop = $request->malop;
		// $lop->tenlop = $request->tenlop;
		// $lop->khoa_id = $request->khoa_id;
		// $lop->created_at = Carbon::now();
		// $lop->updated_at  = Carbon::now();
		// $lop->save();
		
		// return redirect('/lop');
	}
	
	// Form sửa
	public function getSua($id)
	{
		$nd = NguoiDung::find($id);

		
		
		return view('nguoidung.sua', compact('nd'));
	}
	
	// Xử lý sửa
	public function postSua(Request $request)
	{
		$request->validate([
			//'malop' => 'required|max:8|unique:lop,id,' . $id,
			//'tenlop' => 'required|max:50',
		]);
		//$temp="";
		$nd = NguoiDung::find($request->id);
		$nd->name = $request->malop;
	
		if($request->hasFile('hinhanh')){
			$Fimage=$request->file('hinhanh');
			$temp=time().'_'.$Fimage->getClientOriginalName();
			$Path=public_path('./images');
			$Fimage->move($Path,$temp);
			$nd->hinhanh="public/images/".$temp;
		}
		
		$nd->updated_at  = Carbon::now();
		$nd->save();
		if((Auth::user()->quyenhan)==1){
					return redirect('/nguoidung');

		}
		else{
					return redirect('/trangchu');

		}
	}
	
	// Xác nhận xóa
	public function getXoa($id)
	{
		$lop = Lop::find($id);
		return view('lop.xoa', compact('lop'));
	}
	
	// Xử lý xóa
	public function postXoa(Request $request, $id)
	{
		$lop = Lop::find($id);
		$lop->delete();
		
		return redirect('/lop');
	}
}
