<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;

    protected $table = 'slideshow';  // Tên bảng trong CSDL
    protected $fillable = ['S_img', 'caption1', 'caption2']; // Các cột có thể thao tác
}
