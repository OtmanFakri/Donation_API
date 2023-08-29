<?php

namespace App\Http\Controllers;

use App\Events\ConfurmOrderByOwner as EventsConfurmOrderByOwner;
use App\Models\Orders;
use Illuminate\Http\Request;
use Src\Order\Repositories\OrderRepositories;

class confirmOrderByOwner extends Controller
{



    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(Request $request, Orders $order)
    {

        $this->authorize('create', $order);

        if ($order->owner_id !== auth()->id()) {
            return response()->json(['error' => 'You are not the Owner of this order'], 403);
        }

        // Update seller confirmation status
        OrderRepositories::ConfurmOrderByOwner($order);


        // Create a seller order confirmation record
        OrderRepositories::CustomerOrderConfirmation($order->order_id);


        // Check if both buyer and seller confirmed, update seller's coins
        event(new EventsConfurmOrderByOwner($order));

        return response()->json(['message' => 'Order confirmed by the seller']);
    }
}
