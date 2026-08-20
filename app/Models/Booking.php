<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
// use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'room_id',
    'user_id',
    'booking_id_number',
    'booking_amount',
    'booking_days',
    'booking_expiration',
    'booked_room_name',
    'booked_room_number',
    'booked_user_name',
    'booked_user_email',
])]

class Booking extends Model
{
    protected $casts = [
        'booking_expiration' => 'datetime',
    ];

    public function room():BelongsTo{
        return $this->belongsTo(Room::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
