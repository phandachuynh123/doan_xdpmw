<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\KhachHang;
use App\Models\TuyenDuong;
use App\Models\TramDung;
use App\Models\LoaiXe;
use App\Models\ChuyenDi;
use App\Models\VeXe;
use App\Models\Xe;
use App\Models\NhanVien;
use Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //trang chủ
    public function home()
    {
        
        return view('layout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //trang login
    public function index()
    {
        $loaixe=LoaiXe::all();
        $tuyenduong=TuyenDuong::all();
        $tramdung=TramDung::all();
        return view('login')->with(compact('tramdung','tuyenduong','loaixe'));
    }
    //Kiểm tra emal,sdt của khách hàng để đăng nhập
    public function checklogin(Request $request)
    {
        $mail=$request->mail;
        $sdt=$request->sdt;
        $khachhang=KhachHang::where('mail',$mail)->where('sdt',$sdt)->first();
        $lx=DB::table('loai_xe')->orderBy('malx','DESC')->first();
        $loaixe=LoaiXe::all();
        $xe=Xe::all();
        $tuyenduong=TuyenDuong::all();
        $tramdung=TramDung::all();
        $ve=VeXe::where('sdt',$sdt)->get();
        $chuyendi=ChuyenDi::all();
        $nhanvien=NhanVien::where('mail',$mail)->where('sdt',$sdt)->first();
        if (KhachHang::where('mail',$mail)->where('sdt',$sdt)->exists()) {
            \Session::put('ten',$khachhang->tenkh);
             return view('successlogin')->with(compact('tramdung','tuyenduong','loaixe','mail','sdt','khachhang','chuyendi','lx','ve','xe'));
        }
       elseif (NhanVien::where('mail',$mail)->where('sdt',$sdt)->exists()) {
        \Session::put('admin',$nhanvien->tennv);
        \Session::put('adminnv',true);
             return view('admin')->with(compact('nhanvien'));
        }
        else{
           return redirect()->back()->with('error','Email hoặc Số điện thoại bị sai, Xin mời nhập lại');
        }
    }
    public function logout(){
        \Session::put('name',null);
        \Session::put('admin',null);
        \Session::put('adminnv',null);
        return redirect('/index');
    }

}
