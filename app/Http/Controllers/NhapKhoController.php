<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhapKho;
use App\NhaCungCap;
use App\ToChuc;
use App\ChiTietNhap;

class NhapKhoController extends Controller
{
    //
    public function getDanhSach()
    {
	    $nhapkho = NhapKho::all();
	    return view('admin.nhapkho.danhsach',['nhapkho' => $nhapkho]);
	}

	public function getThem()
	{
		$tochuc = ToChuc::all();
		$nhacungcap = NhaCungCap::all();
		return view('admin.nhapkho.them',['tochuc' => $tochuc, 'nhacungcap' => $nhacungcap]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'ToChuc' => 'required',
                'tonggia' => 'required|min:3|max:100',
                'giamgia' => 'required|min:3|max:100',
                'NhaCungCap' => 'required',
                'ngaynhap' => 'required',
                'tientrancc' => 'required|min:3|max:100'
            ],
            [
                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 

                'tonggia.required' => 'Bạn chưa nhập tổng số tiền nhập kho', 
                'tonggia.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

                'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
                'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

                'NhaCungCap.required' => 'Bạn chưa nhập tên nhà cung cấp',

                'ngaynhap.required' => 'Bạn chưa nhập ngày nhập kho',

                'tientrancc.required' => 'Bạn chưa nhập số tiền trả nhà cung cấp', 
                'tientrancc.min' => 'Số tiền trả nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
            ]);

		$nhapkho = new NhapKho;
		$nhapkho->idtc = $request->ToChuc;
		$nhapkho->tonggia = $request->tonggia;
		$nhapkho->giamgia = $request->giamgia;
		$nhapkho->idncc = $request->NhaCungCap;
        $nhapkho->ngaynhap = $request->ngaynhap;
		$nhapkho->tientrancc = $request->tientrancc;
		$nhapkho->ghichu = $request->ghichu;
		$nhapkho->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($idnhap)
    {
        $nhapkho = NhapKho::find($idnhap);
        $nhacungcap = NhaCungCap::all();
        $tochuc = ToChuc::all();
        return view('admin.nhapkho.sua',['nhapkho' => $nhapkho,'nhacungcap' => $nhacungcap,'tochuc' => $tochuc]);
    }

    public function postSua(Request $request, $idnhap)
    {
        $nhapkho = NhapKho::find($idnhap);
        $this->validate($request,
            [
                'ToChuc' => 'required',
                'tonggia' => 'required|min:3|max:100',
                'giamgia' => 'required|min:3|max:100',
                'NhaCungCap' => 'required',
                'tientrancc' => 'required|min:3|max:100'
            ],
            [
                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 

                'tonggia.required' => 'Bạn chưa nhập tổng số tiền nhập kho', 
                'tonggia.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

                'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
                'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

                'NhaCungCap.required' => 'Bạn chưa nhập tên nhà cung cấp',

                'ngaynhap.required' => 'Bạn chưa nhập ngày nhập kho',

                'tientrancc.required' => 'Bạn chưa nhập số tiền trả nhà cung cấp', 
                'tientrancc.min' => 'Số tiền trả nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
            ]);
        $nhapkho->idtc = $request->ToChuc;
        $nhapkho->tonggia = $request->tonggia;
        $nhapkho->giamgia = $request->giamgia;
        $nhapkho->tientrancc = $request->tientrancc;
        $nhapkho->ngaynhap = $request->ngaynhap;
        $nhapkho->idncc = $request->NhaCungCap;
        $nhapkho->ghichu = $request->ghichu;
        $nhapkho->save();
         return redirect('admin/nhapkho/sua/'.$idnhap)->with('thongbao','Sửa thành công');
    }

    public function getXoa($idnhap)
    {
        $nhapkho = NhaCungCap::find($idnhap);
        $nhapkho -> delete();
        return redirect('admin/nhapkho/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
