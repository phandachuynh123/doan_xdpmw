<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    use HasFactory;
    public $timestamps=false;
protected $fillable=[
    'sohang','socot','sotang'
];
protected $primaryKey='maghe';
protected $table='ghe';
public function ve(){
    return $this->hasMany('App\Models\VeXe');
}
}
