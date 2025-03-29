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
Route::get('/index', function () {
    return view('pages.thongtin');  
});
//thay đổi đường dẫn view để xem các trang khác 

use App\Http\Controllers\User\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\User\SearchController;
Route::post('/search-results', [SearchController::class, 'index'])->name('search_results');

use App\Http\Controllers\RoomController;
Route::get('/rooms', [RoomController::class, 'index']);

use App\Http\Controllers\BookingController;
Route::get('/fill_info', [BookingController::class, 'showForm'])->name('fill_info');

use App\Http\Controllers\CartController;
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
