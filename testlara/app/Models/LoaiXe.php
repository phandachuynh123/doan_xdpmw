<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiXe extends Model
{
    use HasFactory;
    public $timestamps=false;
protected $fillable=[
    'tenlx','soghe','anh'
];
protected $primaryKey='malx';
protected $table='loai_xe';
public function xe(){
    return $this->hasMany('App\Models\Xe');
}
public function chuyendi(){
    return $this->hasMany('App\Models\ChuyenDi','macd','macd');
}
}
