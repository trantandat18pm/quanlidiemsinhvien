<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\SinhVien;
use App\Khoa;
use App\Lop;
use App\GiangVien;
class HomeController extends Controller
{
	public function __construct()
	{
		
	}
	
	public function getHome()
	{
		return view('trangchu');
	}
	public function getTrangchu()
	{
		$SLSV=SinhVien::all()->count();
		$SLGV=GiangVien::all()->count();
		$SLK=Khoa::all()->count();
		$SLL=Lop::all()->count();
		//echo $SL;
		 return view('homedemo',compact('SLSV','SLGV','SLL','SLK'));
	}

}