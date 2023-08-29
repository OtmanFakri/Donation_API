<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\SellerOrderConfirmation;
use Illuminate\Http\Request;

class confirmOrderBySeller extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(Request $request, Orders $order)
    {
        if ($order->seller_id !== auth()->id()) {
            return response()->json(['error' => 'You are not the seller of this order'], 403);
        }

        // Update seller confirmation status
        $order->seller_confirmation_status = 'confirmed';
        $order->save();

        // Create a seller order confirmation record
        SellerOrderConfirmation::create([
            'order_id' => $order->order_id,
            'confirmation_date' => now(),
            'status' => 'confirmed',
        ]);

        // Check if both buyer and seller confirmed, update seller's coins
        //if ($order->buyer_confirmation_status === 'confirmed') {
        //    $order->seller->coins += 2;
        //    $order->seller->save();
        //}

        return response()->json(['message' => 'Order confirmed by the seller']);
    }
}
