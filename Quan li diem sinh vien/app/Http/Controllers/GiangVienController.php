<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiangVien;
use App\Khoa;
use Carbon\Carbon;
use App\NguoiDung;
use Illuminate\Support\Facades\Hash;
class GiangVienController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	// Danh sách
	public function getDanhSach()
	{
		$giangvien = GiangVien::all();
		$khoa=Khoa::all();
		return view('giangvien.danhsach', compact('giangvien','khoa'));
	}
	
	// Form thêm
	public function getThem()
	{
		$khoa = Khoa::all();
	//	$giangvien = GiangVien::all();
		return view('giangvien.them', compact('khoa'));
	}
	
	// Xử lý thêm
	public function postThem(Request $request)
	{
		$request->validate([
			'magv' => 'required|max:8|unique:giangvien',
            'tengv' => 'required|max:50',
            'khoa_id' => 'required|max:50',      

		]);
		$nd=new NguoiDung();
		$gv = new GiangVien();
		$gv->magv = $request->magv;
		$gv->tengv = $request->tengv;
		$gv->khoa_id = $request->khoa_id;
		$gv->created_at = Carbon::now();
		$gv->updated_at  = Carbon::now();
		$gv->save();
		$nd->name=$request->tengv;
		$nd->username=$request->magv;
		$nd->email=$request->magv."@gmail.com";
		$nd->password=Hash::make('12345');
		$nd->quyenhan='2';
		$nd->save();
		return redirect('/giangvien');
	}
	
	// Form sửa
	public function getSua($id)
	{
		$giangvien = GiangVien::find($id);
		$khoa = Khoa::all();	
		
		return view('giangvien.sua', compact('khoa','giangvien'));
	}
	
	
	// Xử lý sửa
	public function postSua(Request $request, $id)
	{
		
		
		$giangvien = GiangVien::find($id);		
		$giangvien->tengv = $request->tengv;
		$giangvien->khoa_id = $request->khoa_id; 
		$giangvien->updated_at  = Carbon::now();
		$giangvien->save();
		
		return redirect('/giangvien');
	}
	
	// Xác nhận xóa
	public function getXoa($id)
	{
		$giangvien = GiangVien::find($id);
		return view('giangvien.xoa',compact('giangvien'));
	}
	
	// Xử lý xóa
	public function postXoa(Request $request, $id)
	{
		$giangvien = GiangVien::find($id);
		$giangvien->delete();
		
		return redirect('/giangvien');
	}
}
