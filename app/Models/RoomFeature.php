<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'room_id',
    'wifi',
    'air_conditioning',
    'smart_tv',
    'complementary_breakfast',
    'daily_housekeeping',
    'work_desk',
    'room_service',
    'pool_access'
])]
class RoomFeature extends Model
{
    public function room_relation_on_features():BelongsTo{
        return $this->belongsTo(Room::class);
    }
}
