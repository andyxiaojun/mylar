<?php

namespace App\Listeners;

use App\Events\Room;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Room_Liu;

class RoomListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Room  $event
     * @return void
     */
    public function handle(Room $event)
    {
        Room_Liu::where('channel_id',$event->channel)->increment('cont');
    }
}
