<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Mail;
use Carbon\Carbon;
use App\Models\KhachHang;
use App\Models\VeXe;
use App\Models\DatGhe;
use App\Models\TuyenDuong;
use App\Models\TramDung;
use App\Models\LoaiXe;

class CheckoutController extends Controller
{
    //Lưu thông tin Khách hàng và vé vào CSDL
    public function save_customer(Request $request){
         $data=$request->all();
        if (KhachHang::where('mail',$data['mail'])->where('sdt',$data['sdt'])->exists()) {  
        $content=Cart::content();
        foreach($content as $v_content){
        $ve=new VeXe();
        $ve->tenkh=$data['tenkh'];
        $ve->sdt=$data['sdt'];
        $ve->macd=$v_content->id;
        $ve->maghe=$v_content->options->size;
        $ve->kieutra=$data['payment-option'];
        $ve->trangthai=$data['trangthai'];
        $ve->save(); 
        $datve=DatGhe::where('macd',$v_content->id)->where('maghe',$v_content->options->size)->update(['tinhtrang' => 1]);  
    }
        }

        else{
            $khachhang=new KhachHang();    
            $khachhang->tenkh=$data['tenkh'];
            $khachhang->diachi=$data['diachi'];
            $khachhang->sdt=$data['sdt'];
            $khachhang->cmnd=$data['cmnd'];
            $khachhang->mail=$data['mail'];
            $khachhang->save(); 
            $content=Cart::content();
            foreach($content as $v_content){
            $ve=new VeXe();
            $ve->tenkh=$data['tenkh'];
            $ve->sdt=$data['sdt'];
            $ve->macd=$v_content->id;
            $ve->maghe=$v_content->options->size;
            $ve->kieutra=$data['payment-option'];
            $ve->trangthai=$data['trangthai'];
            $ve->save(); 
            $datve=DatGhe::where('macd',$v_content->id)->where('maghe',$v_content->options->size)->update(['tinhtrang' => 1]);  
   
    }
        }
      //Send Mail
        $now=Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail="Vé xác nhận ngày".'  '.$now;
         $content=Cart::content();
            foreach($content as $v_content){
                //lấy giỏ hàng
                $ve_array[]=array(
                    'chuyendi'=>$v_content->name,
                    'maghe'=>$v_content->options->size,
                    'gia'=>$v_content->price,
                    'bienso'=>$v_content->options->size1,
                    'ngaydi'=>$v_content->options->date1,
                    'ngayden'=>$v_content->options->date2
                );
            }
                //lấy khách hàng
                  $ship_array=array(
                    'name'=>$data['tenkh'],
                    'mail'=>$data['mail'],
                    'address'=>$data['diachi'],
                    'sdt'=>$data['sdt'],
                    'cmnd'=>$data['cmnd'],
                    'method'=>$data['payment-option']
                );
            Mail::send('mail.mail_order', ['ve_array'=>$ve_array, 'ship_array'=>$ship_array],function($message) use ($title_mail,$data){
                        $message->to($data['mail'])->subject($title_mail);//send this mail with subject
                        $message->from($data['mail'],$title_mail);//send from this mail
                    });
        Cart::destroy();
return redirect()->back()->with('status','Cảm ơn bạn đã đặt vé ở chỗ chúng tôi,chúng tôi sẽ liên hệ với bạn sớm nhất');
   

}

    //Xóa chuyến đi trông Giỏ hàng
    public function destroy($rowId)
       {
       Cart::remove($rowId);
       return Redirect::to('/show');
       }

}
