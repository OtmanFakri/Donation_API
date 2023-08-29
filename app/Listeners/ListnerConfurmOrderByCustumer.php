<?php

namespace App\Listeners;

use App\Events\ConfurmOrderByCustumer;
use App\Models\User;


class ListnerConfurmOrderByCustumer
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


    public function handle(ConfurmOrderByCustumer $event)
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
