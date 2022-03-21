<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
public $timestamps=false;
protected $fillable=[
    'tenkh','diachi','sdt','cmnd','mail'
];
protected $primaryKey='makh';
protected $table='khach_hang';
public function ve(){
    return $this->hasMany('App\Models\VeXe');
}
}
