<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room; // Sử dụng Model Room

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all(); // Lấy tất cả dữ liệu từ bảng room_detail
        return view('pages.rooms', compact('rooms')); // Trả dữ liệu ra view
    }
}
