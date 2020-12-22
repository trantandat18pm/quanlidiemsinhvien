<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', 'HomeController@getHome')->name('home');
Route::get('/trangchu', 'HomeController@getTrangchu');
// Lớp

Route::get('/lop', 'LopController@getDanhSach')->middleware(['can:admin']);
Route::get('/lop/them', 'LopController@getThem')->middleware(['can:admin']);
Route::post('/lop/them', 'LopController@postThem')->middleware(['can:admin']);
Route::get('/lop/sua/{id}', 'LopController@getSua')->middleware(['can:admin']);
Route::post('/lop/sua/{id}', 'LopController@postSua')->middleware(['can:admin']);
Route::get('/lop/xoa/{id}', 'LopController@getXoa')->middleware(['can:admin']);
Route::post('/lop/xoa/{id}', 'LopController@postXoa')->middleware(['can:admin']);

// Sinh viên
Route::get('/sinhvien/timkiem/', 'SinhVienController@timkiem')->middleware(['can:admin']);
Route::get('/sinhvien', 'SinhVienController@getDanhSach')->middleware(['can:admin']);
Route::get('/sinhvien/them', 'SinhVienController@getThem')->middleware(['can:admin']);
Route::post('/sinhvien/them', 'SinhVienController@postThem')->middleware(['can:admin']);
Route::get('/sinhvien/sua/{id}', 'SinhVienController@getSua')->middleware(['can:admin']);
Route::post('/sinhvien/sua/', 'SinhVienController@postSua')->middleware(['can:admin']);
Route::get('/sinhvien/xoa/{id}', 'SinhVienController@getXoa')->middleware(['can:admin']);
Route::post('/sinhvien/xoa/{id}', 'SinhVienController@postXoa')->middleware(['can:admin']);
Route::post('/sinhvien/nhap', 'SinhVienController@postNhap')->middleware(['can:admin']);
Route::get('/sinhvien/xuat', 'SinhVienController@getXuat')->middleware(['can:admin']);
Route::get('/search/demo','SinhVienController@timkiem')->middleware(['can:admin']);
Route::get('/search/lop','SinhVienController@HienthisinhvienTheoLop')->middleware(['can:admin']);
Route::get('/sinhvien/lop/timkiem/', 'SinhVienController@LayloptuKhoa')->name('ajaxSV')->middleware(['can:admin']);
Route::get('/sinhvien/update/', 'SinhVienController@Update_ajax')->middleware(['can:admin']);
Route::get('/sinhvien/download/cc/', 'SinhVienController@getDownload')->middleware(['can:admin']);



//Khoa
Route::get('/khoa', 'khoaController@getDanhSach')->middleware(['can:admin']);
Route::get('/khoa/them', 'khoaController@getThem')->middleware(['can:admin']);
Route::post('/khoa/them', 'khoaController@postThem')->middleware(['can:admin']);
Route::get('/khoa/sua/{id}', 'khoaController@getSua')->middleware(['can:admin']);
Route::post('/khoa/sua/{id}', 'khoaController@postSua')->middleware(['can:admin']);
Route::get('/khoa/xoa/{id}', 'khoaController@getXoa')->middleware(['can:admin']);
Route::post('/khoa/xoa/{id}', 'khoaController@postXoa')->middleware(['can:admin']);
//Môn học
Route::get('/monhoc', 'MonHocController@getDanhSach')->middleware(['can:admin']);
Route::get('/monhoc/them', 'MonHocController@getThem')->middleware(['can:admin']);
Route::post('/monhoc/them', 'MonHocController@postThem')->middleware(['can:admin']);
Route::get('/monhoc/sua/{id}', 'MonHocController@getSua')->middleware(['can:admin']);
Route::post('/monhoc/sua/{id}', 'MonHocController@postSua')->middleware(['can:admin']);
Route::get('/monhoc/xoa/{id}', 'MonHocController@getXoa')->middleware(['can:admin']);
Route::post('/monhoc/xoa/{id}', 'MonHocController@postXoa')->middleware(['can:admin']);
//Điểm
Route::get('/diem', 'DiemController@getDanhSach')->middleware(['can:giangvien']);
Route::get('/diem/them', 'DiemController@getThem')->middleware(['can:giangvien']);
Route::post('/diem/them', 'DiemController@postThem')->middleware(['can:giangvien']);
Route::get('/diem/them/timSV/', 'DiemController@laySinhVienTuLop')->name('ajax')->middleware(['can:giangvien']);
Route::get('/diem/them/timmons/', 'DiemController@layMonTuLop')->name('ajax1')->middleware(['can:giangvien']);
Route::get('/diem/sua/{MaSV_id}/{maMH_id}', 'DiemController@getSua')->middleware(['can:giangvien']);
Route::post('/diem/sua/{MaSV_id}/{maMH_id}', 'DiemController@postSua')->middleware(['can:giangvien']);
Route::get('/diem/xoa/{MaSV_id}/{maMH_id}', 'DiemController@getXoa')->middleware(['can:giangvien']);
Route::post('/diem/xoa/{MaSV_id}/{maMH_id}', 'DiemController@postXoa')->middleware(['can:giangvien']);
Route::post('/diem/nhap', 'DiemController@postNhap')->middleware(['can:giangvien']);
Route::get('/diem/xuat', 'DiemController@getXuat')->middleware(['can:sinhvien']);
Route::get('/diem/search','DiemController@timkiem')->middleware(['can:giangvien']);
Route::get('/diem/download/', 'DiemController@getDownload')->middleware(['can:giangvien']);


//Giảng viên
Route::get('/giangvien', 'GiangVienController@getDanhSach')->middleware(['can:admin']);
Route::get('/giangvien/them', 'GiangVienController@getThem')->middleware(['can:admin']);
Route::post('/giangvien/them', 'GiangVienController@postThem')->middleware(['can:admin']);
Route::get('/giangvien/sua/{id}', 'GiangVienController@getSua')->middleware(['can:admin']);
Route::post('/giangvien/sua/{id}', 'GiangVienController@postSua')->middleware(['can:admin']);
Route::get('/giangvien/xoa/{id}', 'GiangVienController@getXoa')->middleware(['can:admin']);
Route::post('/giangvien/xoa/{id}', 'GiangVienController@postXoa')->middleware(['can:admin']);
//Thông tin giảng dạy
Route::get('/thongtingiangday', 'thongtingiangdayController@getDanhSach')->middleware(['can:admin']);
Route::get('/thongtingiangday/them', 'thongtingiangdayController@getThem')->middleware(['can:admin']);
//Route::get('/thongtingiangday/them/demo/{id}', 'thongtingiangdayController@GetSubCatAgainstMainCatEdit');
Route::post('/thongtingiangday/them', 'thongtingiangdayController@postThem')->middleware(['can:admin']);
Route::get('/thongtingiangday/sua/{id}', 'thongtingiangdayController@getSua')->middleware(['can:admin']);
Route::post('/thongtingiangday/sua/{id}', 'thongtingiangdayController@postSua')->middleware(['can:admin']);
Route::get('/thongtingiangday/xoa/{id}', 'thongtingiangdayController@getXoa')->middleware(['can:admin']);
Route::post('/thongtingiangday/xoa/{id}', 'thongtingiangdayController@postXoa')->middleware(['can:admin']);
Route::get('/thongtingiangday/timkiem/giangvien/', 'thongtingiangdayController@LayGVTuKhoa')->name('ajaxGV')->middleware(['can:admin']);
Route::get('/thongtingiangday/timkiem/lop/', 'thongtingiangdayController@LayLopTuKhoa')->name('ajaxLop')->middleware(['can:admin']);

Route::get('/danhsachlop', 'ThongtinController@getDanhSach')->middleware(['can:sinhvien']);
Route::get('/danhsachdiem', 'ThongtinController@getDiem')->middleware(['can:sinhvien']);
Route::get('/danhsachdiem/hocki', 'ThongtinController@diemtheohocki')->middleware(['can:sinhvien']);
Route::get('/danhsachdiem/tb', 'ThongtinController@diemtb')->middleware(['can:sinhvien']);
Route::get('/danhsachdiem/tbhe4', 'ThongtinController@DiemTB_He4')->middleware(['can:sinhvien']);


//Người dùng
Route::get('/nguoidung', 'NguoiDungController@getDanhSach')->middleware(['can:admin']);
Route::get('/nguoidung/them', 'LopController@getThem')->middleware(['can:admin']);
// Route::post('/lop/them', 'LopController@postThem');
Route::get('/nguoidung/sua/{id}', 'NguoiDungController@getSua');
Route::post('/nguoidung/sua/{id}', 'NguoiDungController@postSua');
// Route::get('/lop/xoa/{id}', 'LopController@getXoa');
// Route::post('/lop/xoa/{id}', 'LopController@postXoa');
