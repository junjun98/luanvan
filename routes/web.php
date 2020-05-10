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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/{id}',['as'=> 'admin', 'uses'=>'AdminController@index']);
Route::get('login', ['as'=> 'login', 'uses'=>'AdminController@login']);
Route::get('logout', ['as'=> 'logout', 'uses'=>'AdminController@logout']);
Route::post('login', ['as'=> 'login', 'uses'=>'AdminController@postlogin']);
Route::get('dangky', 'AdminController@dangky');
Route::post('dangky', ['as'=> 'dangky', 'uses'=>'AdminController@postdangky']);
Route::get('banhang', ['as'=> 'banhang', 'uses'=>'BanHangController@banhang']);

Route::group(['prefix'=>'admin'],function()
{
	// Tổ chức
	Route::group(['prefix'=>'tochuc'],function()
	{
		Route::get('danhsach','ToChucController@getDanhSach');
		Route::get('them','ToChucController@getThem');
		Route::post('them','ToChucController@postThem');
		Route::get('sua/{idtc}','ToChucController@getSua');
		Route::post('sua/{idtc}','ToChucController@postSua');
		Route::get('xoa/{idtc}','ToChucController@getXoa');
	});

	Route::group(['prefix'=>'nhacungcap'],function()
	{
		Route::get('danhsach','NhaCungCapController@getDanhSach');
		Route::get('them','NhaCungCapController@getThem');
		Route::post('them','NhaCungCapController@postThem');
		Route::get('sua/{idncc}','NhaCungCapController@getSua');
		Route::post('sua/{idncc}','NhaCungCapController@postSua');
		Route::get('xoa/{idncc}','NhaCungCapController@getXoa');
	});

	// Nhập kho
	Route::group(['prefix'=>'nhapkho'],function()
	{
		Route::get('danhsach','NhapKhoController@getDanhSach');
		Route::get('them','NhapKhoController@getThem');
		Route::post('them','NhapKhoController@postThem');
		Route::get('sua/{idnhap}','NhapKhoController@getSua');
		Route::post('sua/{idnhap}','NhapKhoController@postSua');
		Route::get('xoa/{idnhap}','NhapKhoController@getXoa');

	});

	// Chi tiết nhập
	Route::group(['prefix'=>'chitietnhap'],function()
	{
		Route::get('danhsach','ChiTietNhapController@getDanhSach');
		Route::get('them','ChiTietNhapController@getThem');
		Route::post('them','ChiTietNhapController@postThem');
		Route::get('sua/{idctn}','ChiTietNhapController@getSua');
		Route::post('sua/{idctn}','ChiTietNhapController@postSua');
		Route::get('xoa/{idctn}','ChiTietNhapController@getXoa');

	});

	// Hóa đơn
	Route::group(['prefix'=>'hoadon'],function()
	{
		Route::get('danhsach','HoaDonController@getDanhSach');
		Route::get('them','HoaDonController@getThem');
		Route::post('them','HoaDonController@postThem');
		Route::get('sua/{idhd}','HoaDonController@getSua');
		Route::post('sua/{idhd}','HoaDonController@postSua');
		Route::get('xoa/{idhd}','HoaDonController@getXoa');

	});

	// Chi tiết hóa đơn
	Route::group(['prefix'=>'chitiethoadon'],function()
	{
		Route::get('danhsach','ChiTietHoaDonController@getDanhSach');
		Route::get('them','ChiTietHoaDonController@getThem');
		Route::post('them','ChiTietHoaDonController@postThem');
		Route::get('sua/{idcthd}','ChiTietHoaDonController@getSua');
		Route::post('sua/{idcthd}','ChiTietHoaDonController@postSua');
		Route::get('xoa/{idcthd}','ChiTietHoaDonController@getXoa');

	});

	// Hóa đơn ncc
	Route::group(['prefix'=>'hoadonncc'],function()
	{
		Route::get('danhsach','HoaDonNCCController@getDanhSach');
		Route::get('them','HoaDonNCCController@getThem');
		Route::post('them','HoaDonNCCController@postThem');
		Route::get('sua/{idhdncc}','HoaDonNCCController@getSua');
		Route::post('sua/{idhdncc}','HoaDonNCCController@postSua');
		Route::get('xoa/{idhdncc}','HoaDonNCCController@getXoa');

	});

	// Chi tiết hóa đơn ncc
	Route::group(['prefix'=>'chitiethoadonncc'],function()
	{
		Route::get('danhsach','ChiTietHoaDonNCCController@getDanhSach');
		Route::get('them','ChiTietHoaDonNCCController@getThem');
		Route::post('them','ChiTietHoaDonNCCController@postThem');
		Route::get('sua/{idcthdncc}','ChiTietHoaDonNCCController@getSua');
		Route::post('sua/{idcthdncc}','ChiTietHoaDonNCCController@postSua');
		Route::get('xoa/{idcthdncc}','ChiTietHoaDonNCCController@getXoa');

	});

	// Công nợ khách hàng
	Route::group(['prefix'=>'congnokh'],function()
	{
		Route::get('danhsach','CongNoKHController@getDanhSach');
		Route::get('them','CongNoKHController@getThem');
		Route::post('them','CongNoKHController@postThem');
		Route::get('sua/{idcnkh}','CongNoKHController@getSua');
		Route::post('sua/{idcnkh}','CongNoKHController@postSua');
		Route::get('xoa/{idcnkh}','CongNoKHController@getXoa');

	});

	// Công nợ nhà cung cấp
	Route::group(['prefix'=>'congnoncc'],function()
	{

	});

	// Trả hàng
	Route::group(['prefix'=>'trahang'],function()
	{
		Route::get('danhsach','TraHangController@getDanhSach');
		Route::get('them','TraHangController@getThem');
		Route::post('them','TraHangController@postThem');
		Route::get('sua/{idth}','TraHangController@getSua');
		Route::post('sua/{idth}','TraHangController@postSua');
		Route::get('xoa/{idth}','TraHangController@getXoa');

	});

	// Chi tiết trả hàng
	Route::group(['prefix'=>'chitiettrahang'],function()
	{
		Route::get('danhsach','ChiTietTraHangController@getDanhSach');
		Route::get('them','ChiTietTraHangController@getThem');
		Route::post('them','ChiTietTraHangController@postThem');
		Route::get('sua/{idctth}','ChiTietTraHangController@getSua');
		Route::post('sua/{idctth}','ChiTietTraHangController@postSua');
		Route::get('xoa/{idctth}','ChiTietTraHangController@getXoa');

	});

	// Đơn vị tính
	Route::group(['prefix'=>'donvitinh'],function()
	{
		Route::get('danhsach','DonViTinhController@getDanhSach');
		Route::get('them','DonViTinhController@getThem');
		Route::post('them','DonViTinhController@postThem');
		Route::get('sua/{iddvt}','DonViTinhController@getSua');
		Route::post('sua/{iddvt}','DonViTinhController@postSua');
		Route::get('xoa/{iddvt}','DonViTinhController@getXoa');

	});

	Route::group(['prefix' => 'nhomsanpham'], function () {
        Route::get('danhmuc', 'NhomSanPhamController@getDanhMuc');
        Route::get('themdanhmuc', 'NhomSanPhamController@themdanhmuc');
        Route::get('suadanhmuc/{idnsp}', 'NhomSanPhamController@suadanhmuc');
        Route::get('xoadanhmuc/{idnsp}', 'NhomSanPhamController@xoadanhmuc');
        Route::get('alldanhmuc', 'NhomSanPhamController@alldanhmuc');
        Route::post('luudanhmuc', 'NhomSanPhamController@luudanhmuc');
        Route::post('capnhatdanhmuc/{idnsp}', 'NhomSanPhamController@capnhatdanhmuc');
    });

    Route::group(['prefix'=>'nhanvien'],function()
	{
		Route::get('danhsach','NhanVienController@getDanhSach');
		Route::get('them', [
			'as' => 'them',
			'uses' => 'NhanVienController@getThem'
		]);
		// Route::get('them/{id}','NhanVienController@getThem');
		Route::post('them','NhanVienController@postThem');
		Route::get('sua/{idnv}','NhanVienController@getSua');
		Route::post('sua/{idnv}','NhanVienController@postSua');
		Route::get('xoa/{idnv}','NhanVienController@getXoa');
    });

    Route::group(['prefix'=>'kho'],function()
	{
		Route::get('danhsach','KhoController@getDanhSach');
		Route::get('them','KhoController@getThem');
		Route::post('them','KhoController@postThem');
		Route::get('sua/{idkho}','KhoController@getSua');
		Route::post('sua/{idkho}','KhoController@postSua');
		Route::get('xoa/{idkho}','KhoController@getXoa');
    });

    Route::group(['prefix'=>'sanpham'],function()
	{
		Route::get('danhsach','SanPhamController@getDanhSach');
		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');
		Route::get('sua/{idsp}','SanPhamController@getSua');
		Route::post('sua/{idsp}','SanPhamController@postSua');
		Route::get('xoa/{idsp}','SanPhamController@getXoa');
	});

	Route::group(['prefix'=>'khachhang'],function()
	{
		Route::get('danhsach','KhachHangController@getDanhSach');
		Route::get('them','KhachHangController@getThem');
		Route::post('them','KhachHangController@postThem');
		Route::get('sua/{idkh}','KhachHangController@getSua');
		Route::post('sua/{idlh}','KhachHangController@postSua');
		Route::get('xoa/{idkh}','KhachHangController@getXoa');
    });


});
