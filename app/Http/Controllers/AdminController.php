<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\User;
use App\ToChuc;
use Auth, Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
    	
    	return view('admin.layout.trangchu');
    }

    public function login()
    {
    	$user = Auth::check();
        $id = Auth::user()['id'];
        $tochuc = ToChuc::where('id_user', $id)->first();
        // dd($tochuc);
    	return view('admin.login', compact('tochuc'));
    }

    public function dangky()
    {
    	return view('admin.dangky');
    }

    public function postdangky(Request $req)
    {
    	$this->validate($req,
            [
                'sdt'=>'required|min:10|max:11',
                'password'=>'required',
                're_password'=>'required|same:password',
            ]
        );

        $user = new User;
    	$user->sdt = $req->sdt;
    	$user->password = Hash::make($req->password);
    	$user->name = $req->name;
    	$user->email = $req->email;
    	$user->role = "1";
    	$user->save();

    	$tochuc = new ToChuc;
    	$tochuc->id_user = $user->id;
    	$tochuc->tentc = $req->nametc;
    	$tochuc->hoten = $req->name;
    	$tochuc->diachi = $req->address;
    	$tochuc->sdt = $req->sdt;
    	$tochuc->save();

    	return redirect()->back()->with('thongbao', 'Tạo thành công');
    }

    public function postlogin(Request $req)
    {
    	$this->validate($req, 
            [
                'sdt' => 'required|min:10',
                'password' => 'required|min:6|max:25',
            ]
        );

        if(Auth::attempt(array('sdt' => $req->sdt,'password' => $req->password), false, true))
        {
            // return redirect()->back()->with(['flag'=>'success', 'thongbao'=>'Đăng nhập  thành công']);
            $id = Auth::id();
            return redirect()->route('admin', $id);
        }
        else
        {
            return redirect()->back()->with(['flag'=>'danger', 'thongbao'=>'Tài khoản hoặc mật khẩu sai, vui lòng thử lại']);
        }


    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
    
}
