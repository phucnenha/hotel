<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room_detail'; // Chỉ định bảng trong database

    protected $fillable = [
        'room_type', 'bed_type', 'area', 'view',
        'price_per_night', 'discount_percent', 'image_url'
    ];
}
