<?php

namespace App\Imports;

use App\Diem;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
class DiemImport implements ToModel, WithHeadingRow
{
 
    public function model(array $row)
    {
        return new Diem([
            'MaSV_id' => $row['ma_sinh_vien'],
            'maMH_id' => $row['ma_mon'],
            'phan_tram_TX' => $row['phan_tram_tx'],
            'phan_tram_thi' => $row['phan_tram_thi'],
            'diemTX' => $row['diem_tx'],
            'diemthil1' => $row['diem_thi_lan1'],
            'diemthil2' => $row['diem_thi_lan2'],
            'diemtb' => $row['diem_trung_binh'],
            'loaidiem' => $row['loai_diem'],
            'MaGV' =>Auth::user()->username,
         
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
    
}
