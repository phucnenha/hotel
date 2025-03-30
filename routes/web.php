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
 

use App\Http\Controllers\User\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\RoomController;
Route::get('/rooms', [RoomController::class, 'index']);

use App\Http\Controllers\BookingController;
Route::get('/fill_info', [BookingController::class, 'showForm'])->name('fill_info');

use App\Http\Controllers\User\CartController;
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');


Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/remove/{room_id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/checkout/{room_id}', [CartController::class, 'checkout'])->name('cart.checkout');
//--------------Tìm kiếm phòng--------------------------
use App\Http\Controllers\SearchController;
Route::get('/search-room', [SearchController::class, 'showForm'])->name('searchroom.form'); // Hi?n th? form
Route::post('/search-room', [SearchController::class, 'searchRoom'])->name('searchroom.search'); // X? l� t�m ph�ng
Route::get('/booking-information', [SearchController::class, 'hienThiThongTin'])->name('thongtin');

//Route::post('/cart/add', [SearchController::class, 'addToCart'])->name('cart.add');
//Route::get('/cart', [SearchController::class, 'viewCart'])->name('cart.view');