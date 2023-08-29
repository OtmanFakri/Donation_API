<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Orders;
use Illuminate\Http\Request;

class StoreOrder extends Controller
{

    public function __invoke(Request $request, Item $item)
    {

        $order = new Orders([
            'customer_id' => 3,
            'seller_id' => Item::find($item->id)->user_id,
            'order_date' => now(),
            'buyer_confirmation_status' => 'pending',
            'seller_confirmation_status' => 'pending',
        ]);
        $order->save();

        return response()->json(['message' => 'Order sent successfully']);

    }
}
