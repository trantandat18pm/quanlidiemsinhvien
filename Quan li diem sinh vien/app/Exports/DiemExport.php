<?php

namespace App\Exports;

use App\Diem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;
use DB;
use Exportable;
class DiemExport implements FromView
{
 //    public function headings(): array
	// {
 //  		return [
	// 		'Mã sinh viên',
	// 		'Tên sinh viên',
	// 		'Mã môn',
	// 		'Số tín chỉ',
	// 		'Phần trăm TX',
	// 		'Phần trăm thi',
	// 		'Điểm TX',			
	// 		'Điểm thi l1',
	// 		'Điểm thi l2',
	// 		'Diểm TB',
	// 		//'Ghi chú',
	// 	];
	// }
    	
 //    public function collection()
 //    {
 //    	 $output=Auth::user()->username;    
 //        $danhsach= DB::select('
	//        SELECT d.MaSV_id as masv,sv.hoten as tensv,d.mamh_id as mamh,m.sotc as tinchi,d.phan_tram_TX as phantramtx,d.phan_tram_thi as phantramthi,d.diemTX as tx,d.diemthil1 as thiL1,d.diemthil2 as thiL2,d.diemtb as TB
	//        FROM diem d,mon_hoc m, sinhvien sv
	//        Where d.MaSV_id="'.$output.'" and d.mamh_id=m.mamon and sv.masv=d.MaSV_id
	//        '); 
        
 //        foreach ($danhsach as $ds ) {
 //        	 $danhsach1[] = array(
 //        	 '0'=>$ds->masv,
 //        	 '1'=>$ds->tensv,
 //        	 '2'=>$ds->mamh,
 //             '3'=>$ds->tinchi,
 //             '4'=>$ds->phantramtx,
 //             '5'=>$ds->phantramthi,
 //             '6'=>$ds->tx,
 //             '7'=>$ds->thiL1,
 //             '8'=>$ds->thiL2,
 //             '9'=>$ds->TB,	
 //         );
 //        	# code...
 //        }
 //     return (collect($danhsach1));
 //    }
  
   public function view(): View
    {
    	$mssv=Auth::user()->username;    
        return view('export.diem', [
            'diem' => 	 DB::select('
	       SELECT d.MaSV_id as masv,sv.hoten as tensv,d.mamh_id as mamh,m.sotc as tinchi,m.hocki as hk,d.phan_tram_TX as phantramtx,d.phan_tram_thi as phantramthi,d.diemTX as tx,d.diemthil1 as thiL1,d.diemthil2 as thiL2,d.diemtb as TB,d.loaidiem as ld
	       FROM diem d,mon_hoc m, sinhvien sv
	        Where d.MaSV_id="'.$mssv.'" and d.mamh_id=m.mamon and sv.masv=d.MaSV_id
	        '),
	        'TB'=>DB::select('
		        SELECT avg(d.diemtb) as diemtb
		         FROM diem d,mon_hoc m
		         Where d.MaSV_id="'.$mssv.'" and d.mamh_id=m.mamon 
		         '),
	        'Diem4'=>DB::select('
			      SELECT *
			       FROM diem d,mon_hoc m
			       Where d.MaSV_id="'.$mssv.'" and d.mamh_id=m.mamon 
			       '),
	        'demhocki'=>DB::select('
			      SELECT distinct m.hocki as hki
			       FROM diem d,mon_hoc m
			       Where d.MaSV_id="'.$mssv.'" and d.mamh_id=m.mamon 
			       ORDER BY hki
			       ')
       	 ]);
    }
}
