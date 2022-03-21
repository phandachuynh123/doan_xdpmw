<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model

{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'tennv','diachi','sdt','ngaysinh','cmnd','mail'
    ];
    protected $primaryKey='manv';
    protected $table='nhan_vien';
    public function hoadon(){
    return $this->hasMany('App\Models\HoaDon');
}
}

