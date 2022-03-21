<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CT_Ghe extends Model
{
    use HasFactory;
        public $timestamps=false;
    protected $fillable=[
        'bienso','maghe','tenghe'
    ];
    protected $primaryKey='mact ';
    protected $table='ct_ghe';
}
