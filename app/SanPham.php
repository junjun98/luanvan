<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "SanPham";
    protected $primaryKey = 'idsp';

    public $timestamps = false;
    public $fillable = ['tensp', 'idnsp', 'iddvt', 'giaban', 'gianhap', 'hinh', 'idncc', 'soluongton', 'ghichu'];
    public function nhomsanpham()
    {
        return $this->hasMany('App\NhomSanPham', 'idnsp', 'idnsp');
    }

    public function donvitinh()
    {
        return $this->hasMany('App\DonViTinh', 'iddvt', 'iddvt');
    }

    public function nhacungcap()
    {
        return $this->hasMany('App\NhaCungCap', 'idncc', 'idncc');
    }
}
