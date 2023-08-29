<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class indexOrdersReceived extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $Quiry=QueryBuilder::for(
            $user->receivedOrders()
            ->with('item')
            ->orderBy('created_at', 'desc')
            ->with('customer')
        )
            ->paginate(25);

        return response()->json(['orders_received' => $Quiry]);
    }
}
