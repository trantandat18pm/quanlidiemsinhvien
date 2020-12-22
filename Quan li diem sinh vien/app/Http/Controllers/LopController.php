<?php

namespace App\Http\Controllers;

use App\Lop;
use App\Khoa;
use App\SinhVien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
class LopController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	// Danh sách
	public function getDanhSach()
	{
		 // $posts =DB::select('
			// SELECT sv.masv,k.makhoa 
			// FROM sinhvien sv,lop l,khoa k
			// Where sv.lop_id="DH18KT" and sv.lop_id=l.malop and l.khoa_id=k.makhoa
			// '); 
			//echo dd($posts);
		 $lop = Lop::all();
		 $khoa=Khoa::all();
		return view('lop.danhsach', compact('lop','khoa'));
	}
	
	// Form thêm
	public function getThem()
	{
		$khoa = Khoa::all();
		return view('lop.them',compact('khoa'));
	}
	
	// Xử lý thêm
	public function postThem(Request $request)
	{
		$request->validate([
			'malop' => 'required|max:8|unique:lop',
			'tenlop' => 'required|max:50',
			'khoa_id' => 'required|max:50',

		]);
		try{
		
		$lop = new Lop();
		$lop->malop = $request->malop;
		$lop->tenlop = $request->tenlop;
		$lop->khoa_id = $request->khoa_id;
		$lop->created_at = Carbon::now();
		$lop->updated_at  = Carbon::now();
		$lop->save();
	}
	catch(\Exception $e){
		$request->session()->flash('alert-danger', 'Thông tin đã tồn tại trong hệ thống!');
           
	}
		
		return redirect('/lop');
	}
	
	// Form sửa
	public function getSua($id)
	{
		$lop = Lop::find($id);
		$khoa = Khoa::all();
		return view('lop.sua', compact('lop','khoa'));
	}
	
	// Xử lý sửa
	public function postSua(Request $request)
	{
		$request->validate([
			//'malop' => 'required|max:8|unique:lop,id,' . $id,
			//'tenlop' => 'required|max:50',
		]);
		
		$lop = Lop::find($request->id);
		$lop->malop = $request->malop;
		$lop->tenlop = $request->tenlop;
		$lop->khoa_id = $request->khoa_id;
		$lop->updated_at  = Carbon::now();
		$lop->save();
		
		return redirect('/lop');
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