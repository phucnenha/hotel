<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
       // Lấy tất cả dữ liệu từ bảng slideshow
       $slides = Slideshow::all();  
       
       $rooms = Room::all(); // Lấy tất cả phòng từ database
       // Truyền dữ liệu vào view
       return view('pages.index', compact('slides'), compact('rooms'));
    }
}

