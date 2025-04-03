<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart'; // Đặt đúng tên bảng

    protected $fillable = [
        'session_id', 'room_id', 'check_in', 'check_out', 'adults', 'children', 'quantity'
    ];

    public $timestamps = false; // Tắt tự động thêm created_at & updated_at
}
