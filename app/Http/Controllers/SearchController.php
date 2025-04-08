<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use App\Models\Slideshow;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // Hiển thị form tìm phòng
    public function showForm()
    {
        $slides = Slideshow::all(); // Lấy dữ liệu slide từ database
        return view("Pages.searchroom", compact('slides')); // Truyền vào view
    }

    // Xử lý tìm phòng
    public function searchRoom(Request $request)
{
    $data = $request->validate([
        'check_in'  => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',
        'adults'    => 'required|integer|min:1|max:10',
        'children'  => 'required|integer|min:0|max:10',
        'sort_by'   => 'nullable|in:asc,desc',
    ]);

    // Lưu vào session
    session([
        'check_in'  => $data['check_in'],
        'check_out' => $data['check_out'],
        'adults'    => $data['adults'],
        'children'  => $data['children'],
        'sort_by'   => $data['sort_by'] ?? 'asc',
    ]);

    $total_guests = $data['adults'] + $data['children'];
    $sort_by = $request->input('sort_by', 'asc');

    // ✅ Lấy danh sách phòng và giảm giá phù hợp với từng phòng
    $available_rooms = Room::with('capacity')
        ->leftJoin('discount', function ($join) use ($data) {
            $join->on('room_detail.id', '=', 'discount.room_id')
                 ->where('discount.start_date', '<=', $data['check_in'])
                 ->where('discount.end_date', '>=', $data['check_out']);
        })
        ->selectRaw('room_detail.*, COALESCE(discount.discount_percent, 0) as discount_percent')
        ->whereHas('capacity', function ($query) use ($total_guests) {
            $query->where('max_capacity', '>=', $total_guests);
        })
        ->where('remaining_rooms', '>', 0)
        ->orderBy('price_per_night', $sort_by)
        ->distinct()  // đảm bảo ko bị trùng
        ->get();

    return view("Pages.searchroom", compact('data', 'available_rooms'));
}

public function hienThiThongTin(Request $request)
{
    $source = $request->input('source', 'book_now'); // Mặc định là đặt ngay nếu không có source

    if ($source === 'book_now') {
        // Lấy dữ liệu từ form Đặt Ngay
        $selectedRoom = $request->input('room');
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $numRooms = $request->input('num_rooms');
        $pricePerNight = $request->input('price_per_night');

        $days = (new \DateTime($checkIn))->diff(new \DateTime($checkOut))->days;
        $roomTotal = $pricePerNight * $days * $numRooms;

        // Tạo mảng dữ liệu đặt ngay
        $bookingData = [
            'rooms' => [
                [
                    'room_type' => $selectedRoom,
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                    'adults' => $adults,
                    'children' => $children,
                    'rooms' => $numRooms,
                    'price_per_night' => $pricePerNight,
                    'room_total' => $roomTotal,
                ],
            ],
            'total' => $roomTotal
        ];

        // Lưu vào session riêng
        session(['book_now' => $bookingData]);

        return view('pages.thongtin', [
            'source' => 'book_now',
            'sessionBookNow' => $bookingData
        ]);
    }

    elseif ($source === 'cart') {
        // Lấy dữ liệu từ session giỏ hàng
        $bookedRooms = session('bookedRooms', []);

        $totalAmount = collect($bookedRooms)->sum('room_total');

        return view('pages.thongtin', [
            'source' => 'cart',
            'bookedRooms' => $bookedRooms,
            'totalAmount' => $totalAmount
        ]);
    }

    // Nếu source không hợp lệ → về trang chủ
    return redirect()->route('home')->with('error', 'Nguồn không hợp lệ!');
}


}