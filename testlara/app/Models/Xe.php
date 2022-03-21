<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xe extends Model
{
    use HasFactory;
    public $timestamps=false;
protected $fillable=[
    'bienso','malx','tinhtrang'
];
protected $primaryKey='maxe';
protected $table='xe';
public function loaixe(){
    return $this->belongsTo('App\Models\LoaiXe','malx','malx');
}
}
