<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'nationality',
    ];

    public $timestamps = false;
    public function bookings(){
        return $this->hasMany(Booking::class);
    }

}
