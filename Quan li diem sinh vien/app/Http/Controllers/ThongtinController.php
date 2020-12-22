<?php

namespace App\Http\Controllers;
use App\SinhVien;
use App\Lop;
use App\Diem;
use Illuminate\Http\Request;
use Auth;
use DB;

class ThongtinController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }
    public function getDanhSach()
	{
        $malop=SinhVien::where('masv', Auth::user()->username )->get();
		$danhsach=SinhVien::where('lop_id',  $malop[0]->lop_id)->get();
		$tenlop=Lop::select('tenlop')->where('malop',  $malop[0]->lop_id )->get();
	 //   echo $tenlop;
		//echo $danhsach;
		return view('thongtin.danhsachSV', compact('danhsach','malop','tenlop'));
    }
    public function getDiem()
	{
     $masv_login=Auth::user()->username;    
	//	$danhsach=Diem::where('MaSV_id', Auth::user()->username )->get();
		$sinhvien=SinhVien::where('masv',  Auth::user()->username)->get();
		$danhsach=DB::select('
       SELECT d.*,m.sotc,m.tenmh
       FROM diem d,mon_hoc m
       Where d.MaSV_id="'.$masv_login.'" and d.mamh_id=m.mamon 
       '); 
		return view('thongtin.danhsachdiem', compact('danhsach','sinhvien'));
	}
	public function diemtheohocki(Request $request){
		if($request->ajax())
    {
    $output=Auth::user()->username;    
    if(($request->search)==0){
       $products=DB::select('
       SELECT d.*,m.sotc,m.tenmh
       FROM diem d,mon_hoc m
       Where d.MaSV_id="'.$output.'" and d.mamh_id=m.mamon
       '); 
    }
    else{
       $products=DB::select('
       SELECT d.*,m.sotc,m.tenmh
       FROM diem d,mon_hoc m
       Where d.MaSV_id="'.$output.'" and d.mamh_id=m.mamon and m.hocki="'.$request->search.'"
       '); 
    }
 
			 
    if($products)
    {
    foreach ($products as $key => $product) {
        // var_dump($product);
        
		$output.='<tr>'.		
  
        '<td>'.$product->maMH_id.'</td>'.
        '<td>'.$product->tenmh.'</td>'.
        '<td>'.$product->sotc.'</td>'.
          '<td>'.$product->phan_tram_TX.'</td>'.
        '<td>'.$product->phan_tram_thi.'</td>'.
        '<td>'.$product->diemTX.'</td>'.
        '<td>'.$product->diemthil1.'</td>'.
        '<td>'.$product->diemthil2.'</td>'.       
          '<td>'.$product->diemtb.'</td>'.
           '<td>'.$product->loaidiem.'</td>'.

			'</tr>'
			;
			
    
    }
    return Response($output);
       }
        }
    }
    public function diemtb(Request $request){
		if($request->ajax())
    {
    $output="";
   	$mssv=Auth::user()->username;  
   
    if($request->search1==0){
      $products=DB::select('
      SELECT avg(d.diemtb) as diemtb
       FROM diem d,mon_hoc m
       Where d.MaSV_id="'.$mssv.'" and d.mamh_id=m.mamon 
       '); 
         if($products)
    {
    foreach ($products as $key ) {
      if(($key->diemtb)==null){
      $demo=$key->diemtb;
       $output.=  '<h5 class="text-danger">'.'Điểm trung bình hệ 10 của tất cả học kì  là = '.'học kì chưa nhập điểm!'.'</h5>';
      }
      else{
         $demo=$key->diemtb;
         $demo2=floor($demo * 100) / 100;
       $output.=  '<h5 class="text-danger">'.'Điểm trung bình hệ 10 của tất cả học kì  là ='.$demo2.'</h5>';
      }
      
     
      //echo dd($products);

    }
    return Response($output);
       }
    }
    else{
  $products=DB::select('
        SELECT avg(d.diemtb) as diemtb
         FROM diem d,mon_hoc m
         Where d.MaSV_id="'.$mssv.'" and d.mamh_id=m.mamon and m.hocki="'.$request->search1.'"
         '); 
     if($products)
    {
    foreach ($products as $key ) {
      if(($key->diemtb)==null){
      $demo=$key->diemtb;
    //  $demo2=floor($demo * 100) / 100;
       $output.=  '<h5 class="text-danger">'.'Điểm trung bình hệ 10 học kì '.$request->search1. ' là = '.'học kì chưa nhập điểm!'.'</h5>';
      }
      else{
         $demo=$key->diemtb;
         $demo2=floor($demo * 100) / 100;
       $output.=  '<h5 class="text-danger">'.'Điểm trung bình hệ 10 học kì '.$request->search1. ' là ='.$demo2.'</h5>';
      }
      
     
      //echo dd($products);

    }
    return Response($output);
       }
    }

 
        }
    }
    public function DiemTB_He4(Request $request){
    if($request->ajax())
    {
    $output="";
    $countHOCKI=$request->search1;
    $mssv=Auth::user()->username;  
    if($request->search1==0){
  $products=DB::select('
      SELECT *
       FROM diem d,mon_hoc m
       Where d.MaSV_id="'.$mssv.'" and d.mamh_id=m.mamon 
       '); 
    $countHOCKI='tất cả học kì';
    }
    else{
  $products=DB::select('
      SELECT *
       FROM diem d,mon_hoc m
       Where d.MaSV_id="'.$mssv.'" and d.mamh_id=m.mamon and m.hocki="'.$request->search1.'"
       '); 
    }
 
    $He4=0;
    $tinchi=0;
    $DiemHe4=0;
    if($products)
    {

    foreach ($products as $key ) {
      
      if($key->loaidiem=="A"){
        $He4=$He4+(4*$key->sotc);
        $tinchi=$tinchi+$key->sotc;
      }
       if($key->loaidiem=="B"){
        $He4=$He4+(3*$key->sotc);
         $tinchi=$tinchi+$key->sotc;

      }
        if($key->loaidiem=="C"){
        $He4+=(2*$key->sotc);
         $tinchi=$tinchi+$key->sotc;

      }
       if($key->loaidiem=="D"){
        $He4+=(1*$key->sotc);
         $tinchi=$tinchi+$key->sotc;

      }
        if($key->loaidiem=="F"){
        $He4+=(0*$key->sotc);
         $tinchi=$tinchi+$key->sotc;

      }
 

    }
    
    $DiemHe4=$He4/$tinchi;
    $demo2=floor($DiemHe4 * 100) / 100;
    $output.= '<h5 class="text-danger">'.'Điểm trung bình hệ 4 học kì '.$countHOCKI. ' là ='.$demo2.'</h5>';
    return Response($output);
       }
        }
    }
}
