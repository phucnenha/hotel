<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Room;
class CartController extends Controller
{
    public function index(Request $request)
    {
        $sessionId = session()->getId(); 

        // Lấy dữ liệu giỏ hàng theo session_id
        $cartItems = Cart::where('session_id', $sessionId)->get();

        // Kiểm tra nếu giỏ hàng trống
        if ($cartItems->isEmpty()) {
            return view('user.cart', ['shoppingCart' => []]);
        }
        
        $shoppingCart = $cartItems->map(function ($cart) {
            $room = Room::find($cart->room_id);
            return [
                'room_id' => $cart->room_id,
                'room_type' => $room->room_type ?? 'Không xác định',
                'image_url' => $room->image_url ?? '',
                'price_per_night' => $room->price_per_night ?? 0,
                'check_in' => $cart->check_in,
                'check_out' => $cart->check_out
            ];
        });

        return view('user.cart', compact('shoppingCart'));
    }

    public function remove($roomId)
{
    $sessionId = session()->getId(); 

    // Xóa phòng khỏi CSDL theo session_id
    Cart::where('session_id', $sessionId)
        ->where('room_id', $roomId)
        ->delete();

    // Lấy lại danh sách giỏ hàng sau khi xóa
    $cartItems = Cart::where('session_id', $sessionId)->get();
    $shoppingCart = $cartItems->map(function ($cart) {
        $room = Room::find($cart->room_id);
        return [
            'room_id' => $cart->room_id,
            'room_type' => $room->room_type ?? 'Không xác định',
            'image_url' => $room->image_url ?? '',
            'price_per_night' => $room->price_per_night ?? 0,
            'check_in' => $cart->check_in,
            'check_out' => $cart->check_out
        ];
    });

    // Cập nhật lại giỏ hàng trong session để giao diện cũng thay đổi
    session(['shoppingCart' => $shoppingCart]);

    return redirect()->route('cart.index')->with('noti', 'Đã xóa phòng khỏi giỏ hàng!');
}


    public function checkout($roomId)
    {
        return redirect()->route('cart.index')->with('noti', 'Chuyển đến trang đặt phòng!');
    }
    public function addToCart(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:room_detail,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        // Lấy session_id (dùng để phân biệt khách hàng chưa đăng nhập)
        $session_id = session()->getId();

        // Thêm vào giỏ hàng
        Cart::create([
            'session_id' => $session_id,
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adults' => $request->adults ?? 1,
            'children' => $request->children ?? 0,
            'quantity' => 1, // Giả định mặc định số lượng là 1
        ]);

        return redirect()->route('cart')->with('noti', 'Phòng đã được thêm vào giỏ hàng!');
    }
}