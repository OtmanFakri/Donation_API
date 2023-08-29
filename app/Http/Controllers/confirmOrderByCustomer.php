<?php

namespace App\Http\Controllers;

use App\Events\ConfurmOrderByCustumer;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Src\Order\Repositories\OrderRepositories;

class confirmOrderByCustomer extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(Request $request, Orders $order)
    {
        //Authorize
        $this->authorize('create', $order);


        if ($order->customer_id !== auth()->id()) {
            return response()->json(['error' => 'You are not the customer of this order'], 403);
        }

        // Update buyer confirmation status
        OrderRepositories::ConfurmOrderByCustumer($order);


        // Create a buyer order confirmation record
        OrderRepositories::CustomerOrderConfirmation($order->order_id);


        // Check if both buyer and seller confirmed, update seller's coins
        event(new ConfurmOrderByCustumer($order));


        return response()->json(['message' => 'Order confirmed by the customer']);
    }
}
