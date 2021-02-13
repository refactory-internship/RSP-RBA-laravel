<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $dates = [
        'booking_time',
        'check_in_time',
        'check_out_time',
        'deleted_at'];
    protected $casts = [
        'isCheckedIn' => 'boolean'
    ];

    public function getFormattedBookingTime()
    {
        return $this->booking_time->format('Y-m-d');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
