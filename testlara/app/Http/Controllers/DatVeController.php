<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Models\TuyenDuong;
use App\Models\TramDung;
use App\Models\LoaiXe;

class DatVeController extends Controller
{
    //Hiện vé xe trong Giỏ hàng
    public function vexe(Request $request)
    {
        $macd=$request->macd;
        $ngaykh=$request->ngaykh;
        $ghe=$request->input('ghe');
        $chuyendi=DB::table('chuyen_di')->where('macd',$macd)->first();
        $loaixe=DB::table('loai_xe')->orderBy('malx','DESC')->first();
        $datghe=DB::table('datghe')->where('maghe',$ghe)->first();
        $data['id']=$chuyendi->macd;
        $data['qty']='1';
        $data['name']=$chuyendi->tuyenduong;
        $data['price']=$chuyendi->tongtien;
        $data['weight']='1';
        $data['options']['image']=$loaixe->anh;
        $data['options']['size']=$ghe;
        $data['options']['size1']=$chuyendi->bienso;
        $data['options']['date1']=$chuyendi->ngaydi;
        $data['options']['date2']=$chuyendi->ngayden;
        Cart::add($data);

        return Redirect::to('/show');
        
    }
    //truyền dữ liệu các bảng vào giỏ hàng
       public function show(Request $request)
       {
        $tuyenduong=TuyenDuong::all();
        $tramdung=TramDung::all();
        $loaixe=DB::table('loai_xe')->orderBy('malx','DESC')->get();

        return view('put.show_put')->with(compact('tramdung','tuyenduong','loaixe'));
       }

}
