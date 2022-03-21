<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    use HasFactory;
      public $timestamps=false;
protected $fillable=[
    'sotram','tentinh'
];
protected $primaryKey='matinh';
protected $table='tinh';
}
