<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('shoppingCart', []);
        return view('user.cart', ['shoppingCart' => $cart]);
    }

    public function remove($roomId)
    {
        $cart = session('shoppingCart', []);
        foreach ($cart as $key => $item) {
            if ($item['room_id'] == $roomId) {
                unset($cart[$key]);
                break;
            }
        }
        session(['shoppingCart' => array_values($cart)]);
        return redirect()->route('cart.index')->with('noti', 'Đã xóa phòng khỏi giỏ hàng!');
    }

    public function checkout($roomId)
    {
        return redirect()->route('cart.index')->with('noti', 'Chuyển đến trang đặt phòng!');
    }
}