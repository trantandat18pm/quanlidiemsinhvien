<?php

namespace App\Http\Controllers;

use App\Khoa;
use App\Lop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KhoaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	// Danh sách
	public function getDanhSach()
	{
		$khoa = Khoa::all();
		return view('khoa.danhsach', compact('khoa'));
	}
	
	// Form thêm
	public function getThem()
	{
		return view('khoa.them');
	}
	
	// Xử lý thêm
	public function postThem(Request $request)
	{
		$request->validate([
			'makhoa' => 'required|max:8|unique:khoa',
			'tenkhoa' => 'required|max:50',
		]);
		
		$khoa = new Khoa();
		$khoa->makhoa = $request->makhoa;
		$khoa->tenkhoa = $request->tenkhoa;
		$khoa->created_at = Carbon::now();
		$khoa->updated_at  = Carbon::now();
		$khoa->save();
		
		return redirect('/khoa');
	}
	
	// Form sửa
	public function getSua($id)
	{
		$khoa = Khoa::find($id);
		return view('khoa.sua', compact('khoa'));
	}
	
	// Xử lý sửa
	public function postSua(Request $request, $id)
	{
		$request->validate([
			'makhoa' => 'required|max:8|unique:khoa,id,' . $id,
			'tenkhoa' => 'required|max:50',
		]);
		
		$khoa = Khoa::find($id);
		$khoa->makhoa = $request->makhoa;
		$khoa->tenkhoa = $request->tenkhoa;
		$khoa->updated_at  = Carbon::now();
		$khoa->save();
		
		return redirect('/khoa');
	}
	
	// Xác nhận xóa
	public function getXoa($id)
	{
		$khoa = Khoa::find($id);
		return view('khoa.xoa', compact('khoa'));
	}
	
	// Xử lý xóa
	public function postXoa(Request $request, $id)
	{
		$khoa = Khoa::find($id);
		$khoa->delete();
		
		return redirect('/khoa');
	}
}