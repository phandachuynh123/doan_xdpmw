<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    public $timestamps=false;
protected $fillable=[
    'manv','macd','ngaylap','tienthu','tienxang','chiphi','tongtien'
];
protected $primaryKey='mahd';
protected $table='hoa_don';
public function chuyendi(){
    return $this->belongsTo('App\Models\ChuyenDi','macd','macd');
}
public function nhanvien(){
    return $this->belongsTo('App\Models\NhanVien','manv','manv');
}
}
