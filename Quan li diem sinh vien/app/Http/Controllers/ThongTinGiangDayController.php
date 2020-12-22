<?php

namespace App\Http\Controllers;
use App\ThongTinGiangDay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Khoa;
use App\Lop;
use App\GiangVien;
use App\MonHoc;
use DB;
use RealRashid\SweetAlert\Facades\Alert;


class ThongTinGiangDayController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	// Danh sách
	public function getDanhSach()
	{
		$tt = ThongTinGiangDay::all();
		return view('thongtingiangday.danhsach', compact('tt'));
	}
	
	// Form thêm
	public function getThem()
	{
        $tt = ThongTinGiangDay::all();
        $khoa=Khoa::all();
        $lop=Lop::all();
        $giangvien=GiangVien::all();
        $monhoc=MonHoc::all();
		return view('thongtingiangday.them',compact('tt','khoa','giangvien','monhoc','lop'));
	}   
	// Xử lý thêm
	public function postThem(Request $request)
	{
		$request->validate([
			'magv' => 'required|max:8',
			'monhoc' => 'required|max:50',
			'malop' => 'required|max:50',

		]);
		
		$checkdata=DB::table('thongtingiangday')->where('ma_gv', $request->magv)->where('ma_mh', $request->monhoc)->where('ma_lop', $request->malop)->first();
		if($checkdata){				
			
			$tt = ThongTinGiangDay::all();
			$khoa=Khoa::all();
			$lop=Lop::all();
			$giangvien=GiangVien::all();
			$monhoc=MonHoc::all();
			$request->session()->flash('alert-danger', 'Thông tin đã tồn tại trong hệ thống!');
		//	Alert::success('Success Title', 'Success Message');
			return view('thongtingiangday.them',compact('tt','khoa','giangvien','monhoc','lop'));
		}
		else{
		$tt = new ThongTinGiangDay();
		$tt->ma_gv = $request->magv;
		$tt->ma_mh = $request->monhoc;
		$tt->ma_lop = $request->malop;
		$tt->created_at = Carbon::now();
		$tt->updated_at  = Carbon::now();		
		$tt->save();
		$request->session()->flash('alert-success', 'Thêm thông tin thành công!');
		return redirect('/thongtingiangday');
		
		}
		
	
    }   
	
	// Form sửa
	public function getSua($id)
	{
		$thongtingiangday = ThongTinGiangDay::find($id);
		$khoa = Khoa::all();
		return view('thongtingiangday.sua', compact('thongtingiangday','khoa'));
	}
	
	// Xử lý sửa
	public function postSua(Request $request)
	{
		$request->validate([
			// 'id' => 'required|max:8|unique:lop,id,' . $id,
			// 'tenlop' => 'required|max:50',
		]);
		
		$tt = ThongTinGiangDay::find($request->id);
		$tt->ma_gv = $request->ma_gv;
		$tt->ma_mh = $request->ma_mh;
		$tt->ma_lop = $request->ma_lop;
		$tt->updated_at  = Carbon::now();
		$tt->save();
		
		return redirect('/thongtingiangday');
	}
	
	// Xác nhận xóa
	public function getXoa($id)
	{
		$tt = ThongTinGiangDay::find($id);
		return view('thongtingiangday.xoa', compact('tt'));
	}
	
	// Xử lý xóa
	public function postXoa(Request $request, $id)
	{
		$tt = ThongTinGiangDay::find($id);
		$tt->delete();
		
		return redirect('/thongtingiangday');
	}


	public function GetSubCatAgainstMainCatEdit($id){
        echo json_encode(DB::table('Lop')->where('khoa_id', $id)->get());
	}
	public function LayGVTuKhoa(Request $request){
        $data = DB::table('giangvien')->where('khoa_id',$request->khoa_id)->get();
        foreach($data as $val){
            echo "<option value='".$val->magv."'>".$val->tengv."</option>";
        }
        // DB::table('sinhvien')->where('lop_id',$request->lop_id)->get();
        // echo $data;
	}
	public function LayLopTuKhoa(Request $request){
        $data = DB::table('lop')->where('khoa_id',$request->khoa_id)->get();
        foreach($data as $val){
            echo "<option value='".$val->malop."'>".$val->tenlop."</option>";
        }
        // DB::table('sinhvien')->where('lop_id',$request->lop_id)->get();
        // echo $data;
    }
}
