<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/thanhtoan', function () {
    return view('pages.thanhtoan');
});
 

use App\Http\Controllers\User\HomeController;
Route::get('/index', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\RoomController;
Route::get('/rooms', [RoomController::class, 'index']);


use App\Http\Controllers\User\CartController;
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
//--------------Tìm kiếm phòng--------------------------
use App\Http\Controllers\SearchController;
Route::get('/search-room', [SearchController::class, 'showForm'])->name('searchroom.form'); 
Route::post('/search-room', [SearchController::class, 'searchRoom'])->name('searchroom.search'); 
Route::get('/booking-information', [SearchController::class, 'hienThiThongTin'])->name('thongtin');

// ----------------Giỏ hàng-----------------------
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/remove/{room_id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/checkout/{room_id}', [CartController::class, 'checkout'])->name('cart.checkout');

//-----------ĐIỀN THÔNG TIN-----------------//
use App\Http\Controllers\BookingController;
Route::get('/thong-tin-dat-phong', [BookingController::class, 'showBooking'])->name('showBooking');
Route::get('/xoa-phong/{index}', [BookingController::class, 'xoaPhong'])->name('xoaPhong');
Route::post('/save-customer-info', [BookingController::class, 'saveCustomerInfo'])->name('saveCustomerInfo');
Route::get('/payment', [BookingController::class, 'showPaymentPage'])->name('paymentPage');






