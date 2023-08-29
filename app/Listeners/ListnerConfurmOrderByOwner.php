<?php

namespace App\Listeners;

use App\Events\ConfurmOrderByOwner;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListnerConfurmOrderByOwner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {


    }


    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ConfurmOrderByOwner $event)
    {
        $order = $event->order;
        //check if the order is confirmed by the owner
        if ($event->order->owner_confirmation_status === 'accepted') {
            //update the seller coins
            $event->order->delivery_date = now();
            $owner = User::find($order->owner_id);
            // Increment the Coins attribute
            $owner->Coins += 2;
            $owner->save();
            $order->save();
        }
    }
}
