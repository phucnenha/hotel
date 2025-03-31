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
    public function saveCustomerInfo(Request $request)
    {
        $validatedData = $request->validate([
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sdt' => 'nullable|regex:/^[0-9]{10,15}$/',
            'nationality' => 'required|string|max:100',
            'payment_method' => 'required|string',
        ]);

        // Lấy thông tin phòng đã đặt từ session
        $bookedRooms = session()->get('bookedRooms', []);
        $totalAmount = array_sum(array_column($bookedRooms, 'room_total'));

        // Lưu thông tin khách hàng vào session
        session()->put('customer_info', [
            'full_name' => $validatedData['ho_ten'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['sdt'] ?? '',
            'nationality' => $validatedData['nationality'],
            'payment_method' => $validatedData['payment_method'],
            'booked_rooms' => $bookedRooms,
            'total_amount' => $totalAmount,
        ]);

        return redirect()->route('paymentPage');
    }
    public function showPaymentPage()
{
    $customerInfo = session()->get('customer_info', []);
    
    if (empty($customerInfo)) {
        return redirect()->route('showBooking')->with('error', 'Vui lòng nhập thông tin khách hàng trước khi thanh toán.');
    }

    return view('Pages.payment', compact('customerInfo'));
}



}
