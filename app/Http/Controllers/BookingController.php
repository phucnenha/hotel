<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    
        public function xoaPhong($index)
    {
        $bookedRooms = session()->get('bookedRooms', []);
        
        if (isset($bookedRooms[$index])) {
            unset($bookedRooms[$index]);
            session()->put('bookedRooms', array_values($bookedRooms));
        }

        return redirect()->route('showBooking');
    }

    public function showBooking()
    {
        $bookedRooms = session()->get('bookedRooms', []);
        $totalAmount = array_sum(array_column($bookedRooms, 'room_total'));

        return view('Pages.thongtin', compact('bookedRooms', 'totalAmount'));
    }
   // Lưu thông tin khách hàng và đặt phòng vào session
   public function saveCustomerInfo(Request $request)
   {
       // Validate dữ liệu đầu vào
       $validated = $request->validate([
           'ho_ten' => 'required|string|max:255',
           'email' => 'required|email|max:255',
           'sdt' => 'nullable|digits_between:10,15',
           'nationality' => 'required|string|max:100',
           'payment_method' => 'required|string|in:CASH,VNPAY',
       ]);

       // Giả sử $bookedRooms và $totalAmount đã được lưu vào session trước đó khi chọn phòng
       $bookedRooms = session('bookedRooms', []);
       $totalAmount = session('totalAmount', 0);

       // Tạo mảng lưu thông tin khách hàng và booking
       $customerInfo = [
           'full_name' => $validated['ho_ten'],
           'email' => $validated['email'],
           'phone' => $validated['sdt'],
           'nationality' => $validated['nationality'],
           'payment_method' => $validated['payment_method'],
           'booked_rooms' => $bookedRooms,
           'total_amount' => $totalAmount,
       ];

       // Lưu vào session
       session(['customerInfo' => $customerInfo]);

       // Chuyển đến trang thanh toán
       return redirect()->route('showPaymentPage');
   }

   // Hiển thị trang thanh toán
   public function showPaymentPage()
   {
       $customerInfo = session('customerInfo');

       if (!$customerInfo) {
           return redirect()->route('showBooking')->with('error', 'Thông tin đặt phòng không tồn tại.');
       }

       return view('pages.thanhtoan', compact('customerInfo'));
   }

   // Xử lý sau khi nhấn "Đặt phòng" tại trang thanh toán
   public function processPayment(Request $request)
   {
       $customerInfo = session('customerInfo');

       if (!$customerInfo) {
           return redirect()->route('showBooking')->with('error', 'Dữ liệu thanh toán bị thiếu.');
       }

       // Xử lý thanh toán tại đây (giả lập hoặc gọi API)

       // Xoá session sau khi hoàn tất
       session()->forget(['customerInfo', 'bookedRooms', 'totalAmount']);

       return redirect()->route('showBooking')->with('success', 'Đặt phòng thành công!');
   }

}