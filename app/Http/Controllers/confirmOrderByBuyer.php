<?php

namespace App\Http\Controllers;

use App\Models\BuyerOrderConfirmation;
use App\Models\Orders;
use Illuminate\Http\Request;

class confirmOrderByBuyer extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(Request $request, Orders $order)
    {
        if ($order->customer_id !== auth()->id()) {
            return response()->json(['error' => 'You are not the customer of this order'], 403);
        }

        // Update buyer confirmation status
        $order->buyer_confirmation_status = 'confirmed';
        $order->save();

        // Create a buyer order confirmation record
        BuyerOrderConfirmation::create([
            'order_id' => $order->order_id,
            'confirmation_date' => now(),
            'status' => 'confirmed',
        ]);

        // Check if both buyer and seller confirmed, update seller's coins
        //if ($order->seller_confirmation_status === 'confirmed') {
        //    $order->seller->coins += 2;
        //    $order->seller->save();
        //}

        return response()->json(['message' => 'Order confirmed by the buyer']);
    }
}
