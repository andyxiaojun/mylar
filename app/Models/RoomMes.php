<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomMes extends Model
{
    //
    protected $table='room_mes';
    protected $fillable = [
        'channel_id', 'content', 'user_id','created_at','updated_at',
    ];
}
