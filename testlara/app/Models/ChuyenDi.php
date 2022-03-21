<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuyenDi extends Model
{
    use HasFactory;
    public $timestamps=false;
protected $fillable=[
    'malx','bienso','tuyenduong','ngaydi','ngayden','dendi','denden','tongtien'
];
protected $primaryKey='macd';
protected $table='chuyen_di';
    public function tuyenduong(){
    return $this->belongsTo('App\Models\TuyenDuong','tuyenduong','ten');
}
    public function loaixe(){
    return $this->belongsTo('App\Models\TuyenDuong','tuyenduong','ten');
}
public function hoadon(){
    return $this->hasMany('App\Models\HoaDon');
}
public function ve(){
    return $this->hasMany('App\Models\VeXe');
}
}

