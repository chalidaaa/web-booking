<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'tbl_booking';

    protected $fillable = [
        'user_id',
        'customer_phone',
        'booking_datetime',
        'status',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
