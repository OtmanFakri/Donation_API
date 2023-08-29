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

       // $ordersReceived = $user->receivedOrders()
       //     ->with('items') // Assuming you have a relationship to retrieve the product
       //     ->orderBy('created_at', 'desc')
        //    ->get();

        $Quiry=QueryBuilder::for(
            $user->receivedOrders()
            //->with('items')

            ->orderBy('created_at', 'desc')
            ->with('customer')
        )
            ->paginate(25);

        return response()->json(['orders_received' => $Quiry]);
    }
}
