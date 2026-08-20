<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Models\Room;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'room_id',
    'user_id',
    'booking_id',
    'transaction_id',
    'amount',
    'reference_number',
    'persona_name',
    'persona_email',
    'payment_status',
    'booking_id_number',
])]

class Payment extends Model
{
    public function rooms():BelongsTo{
        return $this->belongsTo(Room::class);
    }

    public function users():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function bookings():BelongsTo{
        return $this->belongsTo(Booking::class);
    }

    protected $casts = [
        'amount' => 'decimal:2',
    ];
}
