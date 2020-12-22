<?php

namespace App\Http\Controllers;

use App\Diem;
use App\SinhVien;
use App\ThongTinGiangDay;
use App\MonHoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Imports\DiemImport;
use App\Exports\DiemExport;
use Illuminate\Support\Facades\Hash;
use Response;

use Auth;
use Excel;
use DB;
class DiemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getDownload()
        {

          $file="public/dowload/Mau_diem    _import.xlsx";
        return Response::download($file);

        }
    // Danh sách
    public function getDanhSach()
    {
         $tt=ThongTinGiangDay::where('ma_gv',Auth::user()->username )->get();
        $malop = DB::table('thongtingiangday')->select('ma_lop')->where('ma_gv',Auth::user()->username )->distinct()->get();
        $monhoc=MonHoc::all();
        
        // $diem =DB::select('
        //      SELECT d.*,l.malop
        //     FROM diem d, mon_hoc m,lop l,sinhvien sv
        //     WHERE d.MaGV="'.Auth::user()->username.'" and d.maMH_id=m.mamon and d.MaSV_id=sv.masv and sv.lop_id=l.malop
        //      ');  
        $diem=Diem::where('MaGV',Auth::user()->username)->paginate(10);
  
        return view('diem.danhsach', compact('diem','tt','malop'));
    }
    
    // Form thêm
    public function getThem()
    {
      //  $monhoc = MonHoc::all();
        $tt=ThongTinGiangDay::where('ma_gv',Auth::user()->username )->get();
        $malop = DB::table('thongtingiangday')->select('ma_lop')->where('ma_gv',Auth::user()->username )->distinct()->get();
      
    //    $sinhvien = SinhVien::where('lop_id','DH18PM')->get();
        return view('diem.them',compact('tt','malop'));
    }
    
    // Xử lý thêm
    public function postThem(Request $request)
    {
        $request->validate([
            'masv' => 'required' ,
         
            


        ]);
       
          $checkdata=DB::select('
             SELECT *
             FROM diem 
             Where MaSV_id="'.$request->masv.'" and maMH_id="'.$request->maMH_id.'"
             '); 
          if($checkdata){
           $request->session()->flash('alert-danger', 'Thông tin đã tồn tại trong hệ thống!');
           
          }
          else{
                if(isset($request->diem_do_an)){
                    $diem = new Diem();
                    $diem->MaSV_id = $request->masv;
                    $diem->maMH_id = $request->maMH_id;
                    $diem->diemTX = "";
                    $diem->diemthil1 = $request->diem_do_an;
                    $diem->diemthil2 = "";
                    $diem->diemtb=$request->diem_do_an;
                    $diem->phan_tram_TX="0";
                    $diem->phan_tram_thi="100";
                     if($diem->diemtb>=8.5){
                  $diem->loaidiem="A";
                 }
                 if($diem->diemtb>=7 && $diem->diemtb<8.5){
                    $diem->loaidiem="B";
                }
                 if($diem->diemtb>=5.5 && $diem->diemtb<7){
                    $diem->loaidiem="C";
                }
                if($diem->diemtb>=4 && $diem->diemtb<5.5){
                    $diem->loaidiem="D";
                }
                if($diem->diemtb<4){
                    $diem->loaidiem="F";
                }
                     $diem->MaGV =Auth::user()->username;              
                    $diem->created_at = Carbon::now();
                    $diem->updated_at  = Carbon::now();
                    $diem->save();

               }
               else{
                if(($request->phan_tram_TX)+($request->phan_tram_thi)!=100){
                    $request->session()->flash('alert-danger', 'Vui lòng chọn đủ 100% điểm!');

                }
                else{
                   if($request->diemthil2==""){
                         $diem = new Diem();
                        $diem->MaSV_id = $request->masv;
                        $diem->maMH_id = $request->maMH_id;
                        $diem->diemTX = $request->diemTX;
                        $diem->diemthil1 = $request->diemthil1;
                        $diem->diemthil2 = "";
                        $diem->diemtb=(($request->diemTX * $request->phan_tram_TX)+($request->diemthil1*$request->phan_tram_thi))/100;
                        $diem->phan_tram_TX=$request->phan_tram_TX;
                        $diem->phan_tram_thi=$request->phan_tram_thi;
                   }
                   else{
                     if( $request->diemthil1>$request->diemthil2){
                         $diem = new Diem();
                        $diem->MaSV_id = $request->masv;
                        $diem->maMH_id = $request->maMH_id;
                        $diem->diemTX = $request->diemTX;
                        $diem->diemthil1 = $request->diemthil1;
                        $diem->diemthil2 = $request->diemthil2;
                        $diem->diemtb=(($request->diemTX * $request->phan_tram_TX)+($request->diemthil1*$request->phan_tram_thi))/100;
                        $diem->phan_tram_TX=$request->phan_tram_TX;
                        $diem->phan_tram_thi=$request->phan_tram_thi;
                    }
                    if($request->diemthil1<$request->diemthil2){
                        $diem = new Diem();
                        $diem->MaSV_id = $request->masv;
                        $diem->maMH_id = $request->maMH_id;
                        $diem->diemTX = $request->diemTX;
                        $diem->diemthil1 = $request->diemthil1;
                        $diem->diemthil2 = $request->diemthil2;
                        $diem->diemtb=(($request->diemTX * $request->phan_tram_TX)+($request->diemthil2*$request->phan_tram_thi))/100;
                        $diem->phan_tram_TX=$request->phan_tram_TX;
                        $diem->phan_tram_thi=$request->phan_tram_thi;

                    }
                      if($request->diemthil1==$request->diemthil2){
                          $diem = new Diem();
                        $diem->MaSV_id = $request->masv;
                        $diem->maMH_id = $request->maMH_id;
                        $diem->diemTX = $request->diemTX;
                        $diem->diemthil1 = $request->diemthil1;
                        $diem->diemthil2 = $request->diemthil2;
                        $diem->diemtb=(($request->diemTX * $request->phan_tram_TX)+($request->diemthil1*$request->phan_tram_thi))/100;
                        $diem->phan_tram_TX=$request->phan_tram_TX;
                        $diem->phan_tram_thi=$request->phan_tram_thi;

                    }
                   }
              
                  

               
               if($diem->diemtb>=8.5){
                  $diem->loaidiem="A";
                 }
                 if($diem->diemtb>=7 && $diem->diemtb<8.5){
                    $diem->loaidiem="B";
                }
                 if($diem->diemtb>=5.5 && $diem->diemtb<7){
                    $diem->loaidiem="C";
                }
                if($diem->diemtb>=4 && $diem->diemtb<5.5){
                    $diem->loaidiem="D";
                }
                if($diem->diemtb<4){
                    $diem->loaidiem="F";
                }
               
        }
                    $diem->MaGV =Auth::user()->username;              
                    $diem->created_at = Carbon::now();
                    $diem->updated_at  = Carbon::now();
                    $diem->save();
    }  

       }
      // echo dd($checkdata);
         return redirect('/diem');
    }
    public function getSua($MaSV_id,$maMH_id)
    {
      // $diem = Diem::where([$MaSV_id,$maMH_id]);
        $diem=Diem::where('MaSV_id',$MaSV_id)->where('maMH_id',$maMH_id)->first();
        $monhoc = MonHoc::all();
        $sinhvien = SinhVien::all();
        return view('diem.sua', compact('sinhvien','monhoc','diem'));
    }
    
    // Xử lý sửa
    public function postSua(Request $request,  $MaSV_id,  $maMH_id)
    {
        $request->validate([
            
        ]);
        
        $diem=Diem::where('MaSV_id',$MaSV_id)->where('maMH_id',$maMH_id)->first();
          if(($request->phan_tram_TX)+($request->phan_tram_thi)!=100){
                    $request->session()->flash('alert-danger', 'Vui lòng chọn đủ 100% điểm!');
                   return back();


                }
else{                     if($request->diemthil2==""){
                        $diem->MaSV_id = $MaSV_id;
                        $diem->maMH_id = $request->maMH_id;
                        $diem->diemTX = $request->diemTX;
                        $diem->diemthil1 = $request->diemthil1;
                        $diem->diemthil2 = "";
                        $diem->diemtb=(($request->diemTX * $request->phan_tram_TX)+($request->diemthil1*$request->phan_tram_thi))/100;
                        $diem->phan_tram_TX=$request->phan_tram_TX;
                        $diem->phan_tram_thi=$request->phan_tram_thi;
                   }
                   else{
                     if( $request->diemthil1>$request->diemthil2){
                      
                        $diem->MaSV_id = $MaSV_id;
                        $diem->maMH_id = $request->maMH_id;
                        $diem->diemTX = $request->diemTX;
                        $diem->diemthil1 = $request->diemthil1;
                        $diem->diemthil2 = $request->diemthil2;
                        $diem->diemtb=(($request->diemTX * $request->phan_tram_TX)+($request->diemthil1*$request->phan_tram_thi))/100;
                        $diem->phan_tram_TX=$request->phan_tram_TX;
                        $diem->phan_tram_thi=$request->phan_tram_thi;
                    }
                    if($request->diemthil1<$request->diemthil2){
                        $diem->MaSV_id = $MaSV_id;
                        $diem->maMH_id = $request->maMH_id;
                        $diem->diemTX = $request->diemTX;
                        $diem->diemthil1 = $request->diemthil1;
                        $diem->diemthil2 = $request->diemthil2;
                        $diem->diemtb=(($request->diemTX * $request->phan_tram_TX)+($request->diemthil2*$request->phan_tram_thi))/100;
                        $diem->phan_tram_TX=$request->phan_tram_TX;
                        $diem->phan_tram_thi=$request->phan_tram_thi;

                    }
                      if($request->diemthil1==$request->diemthil2){
                        $diem->MaSV_id = $MaSV_id;
                        $diem->maMH_id = $request->maMH_id;
                        $diem->diemTX = $request->diemTX;
                        $diem->diemthil1 = $request->diemthil1;
                        $diem->diemthil2 = $request->diemthil2;
                        $diem->diemtb=(($request->diemTX * $request->phan_tram_TX)+($request->diemthil1*$request->phan_tram_thi))/100;
                        $diem->phan_tram_TX=$request->phan_tram_TX;
                        $diem->phan_tram_thi=$request->phan_tram_thi;

                    }
                   }
                    if($diem->diemtb>=8.5){
                        $diem->loaidiem="A";
                    }
                     if($diem->diemtb>=7 && $diem->diemtb<8.5){
                        $diem->loaidiem="B";
                    }
                     if($diem->diemtb>=5.5 && $diem->diemtb<7){
                        $diem->loaidiem="C";
                    }
                    if($diem->diemtb>=4 && $diem->diemtb<5.5){
                        $diem->loaidiem="D";
                    }
                    if($diem->diemtb<4){
                        $diem->loaidiem="F";
                    }

               }
       
         $diem->MaGV =Auth::user()->username;
        $diem->updated_at  = Carbon::now();
        $diem->save();
        
        return redirect('/diem');
    }
    public function getXoa($MaSV_id,$maMH_id)
    {
        $diem=Diem::where('MaSV_id',$MaSV_id)->where('maMH_id',$maMH_id)->first();
        return view('diem.xoa', compact('diem'));
    }
    
    // Xử lý xóa
    public function postXoa(Request $request, $MaSV_id,$maMH_id)
    {
        $diem=Diem::where('MaSV_id',$MaSV_id)->where('maMH_id',$maMH_id)->first();
        $diem->delete();
        
        return redirect('/diem');
    }
    public function postNhap(Request $request)
    {
        try{
         Excel::import(new DiemImport, $request->TapTinExcel);
                $request->session()->flash('alert-success', 'Thêm thông tin thành công!');

        }
       
        catch(\Exception $e){
        $request->session()->flash('alert-danger', 'Thêm thông tin không thành công!');
           
            }
            
        
        return redirect('/diem');
    }
    
    // Xuất ra Excel
    public function getXuat()
    {
        return Excel::download(new DiemExport, 'hthththththt.xlsx');
    }

  

    public function laySinhVienTuLop(Request $request){
        $data = DB::table('sinhvien')->where('lop_id',$request->lop_id)->get();
        foreach($data as $val){
            echo "<option value='".$val->masv."'>".$val->masv."</option>";
        }
        // DB::table('sinhvien')->where('lop_id',$request->lop_id)->get();
        // echo $data;
    }
    public function layMonTuLop(Request $request){
        $data = DB::table('thongtingiangday')->where('ma_gv',Auth::user()->username)->where('ma_lop',$request->lop_id)->get();
        foreach($data as $val){
            echo "<option value='".$val->ma_mh."'>".$val->ma_mh."</option>";
        }
        // DB::table('sinhvien')->where('lop_id',$request->lop_id)->get();
        // echo $data;
    }
    public function timkiem(Request $request){
        if($request->ajax())
    {
    $output="";    
    $products=DB::table('Diem')->where('MaSV_id','LIKE','%'.$request->search."%")->get();
    if($products)
    {
    foreach ($products as $key => $product) {
        // var_dump($product);
        $url = url("diem/sua/" . $product->id);
        $urlxoa = url("/diem/xoa/" . $product->id);
        $output.='<tr>'.        
        '<td>'.$product->MaSV_id.'</td>'.        
        '<td>'.$product->maMH_id.'</td>'.
        '<td>'.$product->phan_tram_TX.'</td>'.
        '<td>'.$product->phan_tram_thi.'</td>'.
        '<td>'.$product->diemTX.'</td>'.
        '<td>'.$product->diemthil1.'</td>'.
          '<td>'.$product->diemthil2.'</td>'.
        '<td>'.$product->diemtb.'</td>'.
          '<td>'.$product->loaidiem.'</td>'.
        
        '<td ><a  href="'.$url.'"><i class="btn btn-info">Sửa</i></a></td>';
     
    
    }
    return Response($output);
       }
       }
    }
}
