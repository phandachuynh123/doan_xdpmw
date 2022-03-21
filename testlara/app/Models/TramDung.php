<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramDung extends Model
{
    use HasFactory;
          public $timestamps=false;
protected $fillable=[
    'tentram','diachi ','sdt'
];
protected $primaryKey='matram ';
protected $table='tram_dung';
}
