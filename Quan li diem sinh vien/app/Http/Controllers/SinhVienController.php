<?php

namespace App\Http\Controllers;

use App\SinhVien;
use App\Lop;
use App\Khoa;
use App\Nguoidung;
use App\Imports\SinhVienImport;
use App\Imports\NguoidungImport;
use App\Exports\SinhVienExport;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Excel;
use DB;
use Response;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
class SinhVienController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function getDownload()
		{

		     $file="public/dowload/Mau_sinhvien_import.xlsx";
        return Response::download($file);

		}
	// Danh sách
	public function getDanhSach()
	{
		$sinhvien = SinhVien::paginate(10);
		//$brands = Brand::simplePaginate(10);
	//	$tenlop=Lop::where('malop',$sinhvien[0]->lop_id);
		$lop=Lop::all();
		$khoa=Khoa::all();
		return view('sinhvien.danhsach', compact('sinhvien','lop','khoa'));
	}
	
	// Form thêm
	public function getThem()
	{
		$lop = Lop::all();
		return view('sinhvien.them', compact('lop'));
	}
	
	// Xử lý thêm
	public function postThem(Request $request)
	{
		// Kiểm tra
		 $request->validate([
             'masv' => 'required|unique:sinhvien' ,
           	 'lop_id' => 'required' ,
           	  'hoten' => 'required' ,
           	   'ngaysinh' => 'required' ,
           	    'dienthoai' => 'int' ,
         
            


        ]);
		
		
		$sv = new SinhVien();
		$nd=new Nguoidung();
		$sv->masv = $request->masv;
		$sv->lop_id = $request->lop_id;
		$sv->hoten = $request->hoten;		
		$sv->ngaysinh = $request->ngaysinh;
		$sv->email = $request->masv."@gmail.com";
		$sv->dienthoai = $request->dienthoai;
		$sv->ghichu = $request->ghichu;
		$sv->created_at = Carbon::now();
		$sv->updated_at = Carbon::now();		
	    $nd->name=$request->hoten;
		$nd->username=$request->masv;
		$nd->email = $request->masv."@gmail.com";
		$nd->password=Hash::make('12345');
		$nd->quyenhan='2';
		
		
		$sv->save();
		$nd->save();
		return redirect('/sinhvien');
	}
	
	// Form sửa
	public function getSua( $id)
	{
		$lop = Lop::all();
		$sinhvien = SinhVien::find($id);
		return view('sinhvien.sua', compact('lop', 'sinhvien'));
	}
	
	// Xử lý sửa
	public function postSua(Request $request)
	{
		// Kiểm tra
		
		$sv = SinhVien::find($request->id);
	//	echo $sv;		
			$sv->lop_id = $request->lop_idedit;
			$sv->hoten = $request->hotenedit;		
			$sv->ngaysinh = $request->ngaysinhedit;
			$sv->email = $request->emailedit;
			$sv->dienthoai = $request->dienthoaiedit;
			$sv->ghichu = $request->ghichuedit;
			$sv->updated_at = Carbon::now();
			$sv->save();		
			return redirect('/sinhvien');
	}
	
	// Xác nhận
	public function getXoa( $id)
	{
		$sinhvien = SinhVien::find($id);
		
	    return view('sinhvien.xoa', compact('sinhvien'));
	}
	
	// Xử lý xóa
	public function postXoa(Request $request)
	{
		 $sinhvien = SinhVien::find($request->id);
		//echo $request->id;
		 $sinhvien->delete();
		
		 return redirect('/sinhvien');
	}
	
	// Nhập từ Excel
	public function postNhap(Request $request)
	{
		
		
		
		try{
			Excel::import(new SinhVienImport, $request->TapTinExcel);
		 Excel::import(new NguoidungImport, $request->TapTinExcel);
		$request->session()->flash('alert-success', 'Thêm thông tin thành công!');
		}
			catch(\Exception $e){
		$request->session()->flash('alert-danger', 'Thêm thông tin không thành công!');
           
			}
			return redirect('/sinhvien');
	}
	
	// Xuất ra Excel
	public function getXuat()
	{
		return Excel::download(new SinhVienExport, 'dssinhvien.xlsx');
	}
	public function timkiem(Request $request){
		if($request->ajax())
    {
    $output="";    
    $products=DB::table('sinhvien')->where('hoten','LIKE','%'.$request->search."%")->get();
    if($products)
    {
    foreach ($products as $key => $product) {
        // var_dump($product);
        $url = url("sinhvien/sua/" . $product->id);
        $urlxoa = url("/sinhvien/xoa/" . $product->id);
		$output.='<tr>'.		
        '<td>'.$product->masv.'</td>'.        
        '<td>'.$product->hoten.'</td>'.
        '<td>'.$product->ngaysinh.'</td>'.
        '<td>'.$product->dienthoai.'</td>'.
        '<td>'.$product->email.'</td>'.
        '<td>'.$product->lop_id.'</td>'.
		'<td ><a  href="'.$url.'"><i class="btn btn-info">Sửa</i></a></td>'. 
		
		'<td ><a class="btn btn-danger" href="'.$urlxoa.'">Xóa</a></td>'.
			'</tr>';
    
    }
    return Response($output);
       }
       }
    }
     public function LayloptuKhoa(Request $request){
        $data = DB::table('lop')->where('khoa_id',$request->makhoa)->get();
        foreach($data as $val){
            echo "<option value='".$val->malop."'>".$val->tenlop."</option>";
        }
        DB::table('sinhvien')->where('lop_id',$request->lop_id)->get();
       
    }
    public function HienthisinhvienTheoLop(Request $request){
		if($request->ajax())
    {
    $output="";    
    $products=DB::table('sinhvien')->where('lop_id',$request->search)->get();
    if($products)
    {
    foreach ($products as $key => $product) {
        // var_dump($product);
        $url = url("sinhvien/sua/" . $product->id);
        $urlxoa = url("/sinhvien/xoa/" . $product->id);
		$output.='<tr>'.		
        '<td>'.$product->masv.'</td>'.        
        '<td>'.$product->hoten.'</td>'.
        '<td>'.$product->ngaysinh.'</td>'.
        '<td>'.$product->dienthoai.'</td>'.
        '<td>'.$product->email.'</td>'.
        '<td>'.$product->lop_id.'</td>'.
		'<td ><a  class="editbtn" href="#"><i class="btn btn-info">Sửa</i></a></td>'.    
		
		'<td ><a class="btn btn-danger" href="'.$urlxoa.'">Xóa</a></td>'.
			'</tr>';
    
    }
    return Response($output);
       }
       }
    }
    public function Update_ajax(Request $request)
    {
    	$sv = DB::table('SinhVien')->where('masv',$request->masv)->first();
		echo $sv;
		
		// $sv->hoten = $request->input('hotenedit');
		// $sv->ngaysinh = $request->input('ngaysinhedit');
		// $sv->email = $request->input('emailedit');
		// $sv->dienthoai = $request->input('dienthoaiedit');
		// $sv->ghichu = $request->input('lop_idedit');
		// $sv->updated_at = Carbon::now();
		// $sv->save();	
    }


   
}