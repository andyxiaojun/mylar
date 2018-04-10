<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room_Liu extends Model
{
	protected $table='room_lius';
    protected $fillable=[
    	'channel_id','cont',
    ];
}
