<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexOrdersSent extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $ordersSent = $user->sentOrders()
            ->with('item') // Assuming you have a relationship to retrieve the product
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['orders_sent' => $ordersSent]);
    }
}
