<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuyenDuong extends Model
{
    use HasFactory;

    public $timestamps=false;
protected $fillable=[
    'diemdi','diemden','ten'
];
protected $primaryKey='matd';
protected $table='tuyen_duong';
 public function chuyendi(){
    return $this->hasMany('App\Models\ChuyenDi');
}

}
