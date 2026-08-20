<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\RoomImages;
use App\Models\Booking;
use App\Models\User;


#[Fillable(['room_name',
            'room_number',
            'room_price',
            'room_number_of_beds',
            'room_booked',
            'room_occupied',
            'room_status',
            'booking_expiration',
            'booking_id_number',
])]

class Room extends Model
{
    protected $casts = [
        'booking_expiration' => 'datetime',
    ];

    public function user_relation_on_room():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function room_images_relation():HasMany{
        return $this->hasMany(RoomImages::class);
    }

    public function room_features_relation():HasMany{
        return $this->hasMany(RoomFeature::class);
    }

    public function booking():HasMany{
        return $this->hasMany(Booking::class);
    }

    public function payment():HasMany{
        return $this->hasMany(Payment::class);
    }


    public function isCurrentlyBooked(): bool
    {
        return $this->booking_expiration && $this->booking_expiration->isFuture();
    }

    public function scopeCurrentlyBooked($query)
    {
        return $query->whereNotNull('booking_expiration')
                    ->where('booking_expiration', '>', now());
    }
}
