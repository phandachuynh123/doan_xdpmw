<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatGhe extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'bienso ','maghe','macd','tinhtrang'
    ];
    protected $primaryKey='madat';
    protected $table='datghe';
}
