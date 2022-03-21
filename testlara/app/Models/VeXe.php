<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeXe extends Model
{
    use HasFactory;
    public $timestamps=false;
protected $fillable=[
    'tenkh','sdt','macd','maghe','kieutra','trangthai','lydo_huy'
];
protected $primaryKey='mave';
protected $table='ve_xe';
 public function chuyendi(){
    return $this->belongsTo('App\Models\ChuyenDi','macd','macd');
}
public function khachhang(){
    return $this->belongsTo('App\Models\KhachHang','makh','makh');
}
public function ghe(){
    return $this->belongsTo('App\Models\Ghe','maghe','maghe');
}
}
