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
            'sort_by'   => $data['sort_by'] ?? 'asc',  // Nếu không có sort_by thì mặc định là 'asc'
        ]);
        
        $total_guests = $data['adults'] + $data['children'];
        $sort_by = $request->input('sort_by', 'asc');
        
        $available_rooms = Room::with('capacity')
        ->leftJoin('discount', 'room_detail.id', '=', 'discount.room_id')  // Kết hợp bảng discount
        ->select('room_detail.*', 'discount.discount_percent')  // Chọn các trường cần thiết
        ->whereHas('capacity', function ($query) use ($total_guests) {
            $query->where('max_capacity', '>=', $total_guests);  // Lọc theo số lượng khách
        })
        ->where('remaining_rooms', '>', 0)  // Kiểm tra số phòng còn lại
        ->orderBy('price_per_night', $sort_by)  // Sắp xếp theo giá
        ->distinct()  // Đảm bảo các phòng không bị trùng
        ->get();

        $slides = Slideshow::all(); // Thêm phần này
        return view("Pages.searchroom", compact('data', 'available_rooms', 'slides'));
    }
    public function hienThiThongTin(Request $request)
    {
        $data = $request->validate([
            'room_id' => 'required|exists:room_detail,id',
            'check_in' => 'nullable|date|after_or_equal:today',
            'check_out' => 'nullable|date|after:check_in',
            'adults' => 'nullable|integer|min:1|max:10',
            'children' => 'nullable|integer|min:0|max:10'
        ]);


        $data['check_in'] = $data['check_in'] ?? now()->toDateString();
        $data['check_out'] = $data['check_out'] ?? now()->addDays(1)->toDateString();
        $data['adults'] = $data['adults'] ?? 1;
        $data['children'] = $data['children'] ?? 0;


        $room = Room::find($data['room_id']);
        if (!$room) {
            return redirect()->back()->withErrors(['message' => 'Phòng không tồn tại']);
        }
        // Kiểm tra số lượng phòng đã thêm
        $maxRooms = 5; // Giới hạn số phòng tối đa có thể thêm vào
        $bookedRooms = session()->get('bookedRooms', []);
        if (count($bookedRooms) >= $maxRooms) {
            return redirect()->route('showBooking')->with('error', 'Bạn chỉ có thể thêm tối đa ' . $maxRooms . ' phòng.');
        }

        $stayDays = \Carbon\Carbon::parse($data['check_out'])->diffInDays(\Carbon\Carbon::parse($data['check_in']));
    
        $discount = DB::table('discount')
            ->where('room_id', $room->id)
            ->where('start_date', '<=', $data['check_in'])
            ->where('end_date', '>=', $data['check_out'])
            ->first();


        $discountPercent = $discount->discount_percent ?? 0;
        $discountedPrice = $room->price_per_night * (1 - ($discountPercent / 100));
        $roomTotal = $discountedPrice * $stayDays;


        $roomData = [
            'room_id' => $room->id,
            'room_type' => $room->room_type,
            'check_in' => $data['check_in'],
            'check_out' => $data['check_out'],
            'adults' => $data['adults'],
            'children' => $data['children'],
            'price_per_night' => $room->price_per_night,
            'discount_percent' => $discountPercent,
            'stay_days' => $stayDays,
            'discounted_price' => $discountedPrice,
            'room_total' => $roomTotal
        ];


        // Lưu thông tin phòng vào session
        $bookedRooms = session()->get('bookedRooms', []);
        $bookedRooms[] = $roomData;
        session()->put('bookedRooms', $bookedRooms);


        return redirect()->route('showBooking');
    }


}