<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use RealRashid\SweetAlert\Facades\Aler;
use App\Models\Tinh;
use App\Http\Requests;
use App\Models\LoaiXe;
use App\Models\ChuyenDi;
use App\Models\TramDung;
use App\Models\KhachHang;
use App\Models\VeXe;
use App\Models\Xe;
use App\Models\DatGhe;
use App\Models\TuyenDuong;
session_start();
class IndexController extends Controller
{
    //trang chủ
	public function home()
    {
        $tinh=Tinh::all();
        $loaixe=LoaiXe::all();
        $tuyenduong=TuyenDuong::all();
        $tramdung=TramDung::all();
        return view('layout')->with(compact('tinh','tramdung','tuyenduong','loaixe'));
    }
    //chức năng tìm kiếm
    public function search(Request $request)
    { 
        $loaixe=LoaiXe::all();
        $tuyenduong=TuyenDuong::all();
        $tramdung=TramDung::all();
        $tinh=Tinh::orderBy('matinh','DESC')->get();
        $time=date('Y-m-d h:i:s');
        $keywords=$request->search_1.' - '.$request->search_2;
        $search_1=$request->search_1;
        $search_2=$request->search_2;
        $search_time=$request->search_time;
        $tramdung=TramDung::orderBy('matram','DESC')->get();
        $loaixe=LoaiXe::orderBy('malx','DESC')->get();
        $xe=Xe::orderBy('maxe','DESC')->get();
      $search_cd=ChuyenDi::where('tuyenduong','like','%'.$keywords.'%')->where('ngaydi','>',$search_time)->get();
       return view('pages.search')->with('search_cd',$search_cd)->with(compact('tinh','loaixe','xe','tramdung','keywords','search_1','search_2','search_time','tramdung','tuyenduong','loaixe'));
    }
    //hiển thị sơ đồ ghế
    public function book(Request $request)
    {   $loaixe=LoaiXe::all();
        $tuyenduong=TuyenDuong::all();
        $tramdung=TramDung::all();
        $data=$request->all();
        $chuyen=$data['macd'];
        $time=$data['ngaykh'];
$chuyendi=ChuyenDi::where('macd','=',$chuyen)->get();
$datghe=DatGhe::all();
$hangA1=DatGhe::where('macd','=',$chuyen)->where('maghe','like','A%')->where('maghe','like','%1')->get();
$hangB1=DatGhe::where('macd','=',$chuyen)->where('maghe','like','B%')->where('maghe','like','%1')->get();
$hangC1=DatGhe::where('macd','=',$chuyen)->where('maghe','like','C%')->where('maghe','like','%1')->get();
$hangD1=DatGhe::where('macd','=',$chuyen)->where('maghe','like','D%')->where('maghe','like','%1')->get();
$hangA2=DatGhe::where('macd','=',$chuyen)->where('maghe','like','A%')->where('maghe','like','%2')->get();
$hangB2=DatGhe::where('macd','=',$chuyen)->where('maghe','like','B%')->where('maghe','like','%2')->get();
$hangC2=DatGhe::where('macd','=',$chuyen)->where('maghe','like','C%')->where('maghe','like','%2')->get();
$hangD2=DatGhe::where('macd','=',$chuyen)->where('maghe','like','D%')->where('maghe','like','%2')->get();
$ve=VeXe::all();
         return view('pages.tickets')->with(compact('datghe','chuyendi','ve','chuyen','time','hangA1','hangC1','hangB1','hangD1','hangA2','hangC2','hangB2','hangD2','tramdung','tuyenduong','loaixe'));
       
    }

}