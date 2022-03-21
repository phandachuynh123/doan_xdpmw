<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\ChuyenDiController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\LoaiXeController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\TaiXeController;
use App\Http\Controllers\VeController;
use App\Http\Controllers\XeController;
use App\Http\Controllers\TinhController;
use App\Http\Controllers\TuyenDuongController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DatVeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GheController;
use App\Http\Controllers\HuyVeController;
use App\Http\Controllers\PayPalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//trang chủ
Route::get('/',[IndexController::class,'home']);
Route::get('/home',[HomeController::class,'home'])->name('home');
Route::get('/index',[HomeController::class,'index']); 
//tìm kiếm
Route::post('/tim-kiem',[IndexController::class,'search'])->name('tim-kiem');
//lấy giá trị bằng ajax
Route::get('/getbienso',[ChuyenDiController::class,'getbienso']);
Route::get('/getbienso-cd',[GheController::class,'getbienso_cd']);
Route::get('/getmaghe',[VeController::class,'getmaghe']);
Route::get('/getsdt',[VeController::class,'getsdt']);
Route::get('/gettong',[HoaDonController::class,'gettong']);
//đặt vé
Route::post('/dat-ve',[IndexController::class,'book'])->name('dat-ve');
Route::post('/get-ghe',[IndexController::class,'datghe'])->name('get-ghe');
Route::post('/vexe',[DatVeController::class,'vexe']);
Route::get('/show',[DatVeController::class,'show'])->name('show');
Route::post('/save_customer',[CheckoutController::class,'save_customer']);
Route::get('/payment',[CheckoutController::class,'payment']);
//hủy vé
Route::post('/huy',[HuyVeController::class,'huy']);
//login
Route::post('/checklogin',[HomeController::class,'checklogin']);

Route::get('/logout',[HomeController::class,'logout']);


Route::delete('/destroy/{rowId}',[CheckoutController::class,'destroy']);
//thanh toán bằng paypal
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
//Send Mail
Route::get('/send-mail',[CheckoutController::class,'send_mail']);
//hiện ds vé chuyển
Route::post('/search-ve',[ChuyenDiController::class,'search_ve']);
Route::post('/chuyen-ve',[ChuyenDiController::class,'chuyen_ve']);
//tìm kiếm chuyến đi
Route::post('/action',[ChuyenDiController::class,'search_ve']);