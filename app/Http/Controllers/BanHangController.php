<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanHangController extends Controller
{
    public function banhang()
    {
    	return view('admin.banhang');
    }
}
