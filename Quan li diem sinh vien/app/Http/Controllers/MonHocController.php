<?php

namespace App\Http\Controllers;

use App\MonHoc;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MonHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $mon_hoc = MonHoc::all();
        return view('monhoc.danhsach', compact('mon_hoc'));
    }

    
    public function getThem()
    {
        //
        $mon_hoc = MonHoc::all();
        return view('monhoc.them',compact('mon_hoc'));
    }
    public function postThem(Request $request)
    {
        $request->validate([
          //  'id' => 'required|max:8|unique:lop',
            'mamon' => 'required|max:50|unique:mon_hoc',
            'tenmh' => 'required|max:50',
            'sotc' => 'required|max:50',
            'hocki' => 'required|max:50',

        ]);
        
        $mon_hoc = new MonHoc();
        $mon_hoc->mamon = $request->mamon;
        $mon_hoc->tenmh = $request->tenmh; 
        $mon_hoc->sotc = $request->sotc; 
        $mon_hoc->hocki = $request->hocki; 
        $mon_hoc->created_at = Carbon::now();
        $mon_hoc->updated_at  = Carbon::now();
        $mon_hoc->save();
        
        return redirect('/monhoc');
    }
    public function getSua($mamon)
    {
        $mon_hoc = MonHoc::find($mamon);
        return view('monhoc.sua', compact('mon_hoc'));
    }
    
    // Xử lý sửa
    public function postSua(Request $request, $mamon)
    {
        $request->validate([           
            //'id' => 'required|max:8|unique:lop',
            'tenmh' => 'required|max:50',
        ]);
        
        $mon_hoc = MonHoc::find($mamon);
        $mon_hoc->mamon = $request->mamon;
        $mon_hoc->tenmh = $request->tenmh;
         $mon_hoc->sotc = $request->sotc;
        $mon_hoc->hocki = $request->hocki;
        $mon_hoc->updated_at  = Carbon::now();
        $mon_hoc->save();
        
        return redirect('/monhoc');
    }
        public function getXoa($id)
    {
        $mon_hoc = MonHoc::find($id);
        return view('monhoc.xoa', compact('mon_hoc'));
    }
    
    // Xử lý xóa
    public function postXoa(Request $request, $id)
    {
        $mon_hoc = MonHoc::find($id);
        $mon_hoc->delete();
        
        return redirect('/monhoc');
    }
    
}
