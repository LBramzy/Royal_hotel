<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Room;

#[Fillable(['image_path', 'room_id'])]
class RoomImages extends Model
{
    public function room_relation_on_images():BelongsTo{
        return $this->belongsTo(Room::class);
    }
}
