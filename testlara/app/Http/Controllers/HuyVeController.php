<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\VeXe;
use App\Models\ChuyenDi;
use App\Http\Requests;
use App\Models\DatGhe;
use Illuminate\Support\Facades\Redirect;

class HuyVeController extends Controller
{
     //Hủy vé xe
     public function huy(Request $request)
    {
        $data=$request->all();
        $ve=VeXe::where('mave',$data['mave'])->first();
        $ve->lydo_huy=$data['lydo'];
        $ve->trangthai=3;
        $ve->save();
     $datve=DatGhe::where('macd',$data['macd'])->where('maghe',$data['maghe'])->update(['tinhtrang' => 0]);  
    }
    
}
