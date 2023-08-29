<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Item;
use App\Models\Orders;
use Illuminate\Http\Request;
use Src\Order\Factories\PostOrderFactory;

class StoreOrder extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(OrderRequest $request)
    {

        $order = new Orders(PostOrderFactory::Create($request->validated())->toarray());

        $order->save();

        return response()->json(['message' => 'Order sent successfully']);

    }
}
