<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'name', 'class', 'text','cover','number','user_id'
    ];

    public function getRouteKeyName()
    {
    	return 'id';
    }
}
