<?php

namespace Src\Order\Repositories;

use App\Models\CustomerOrderConfirmation;
use App\Models\Item;
use App\Models\Orders;
use App\Models\OwnerOrderConfirmation;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Factories\ItemPostFactory;
use Src\Item\Images\Factories\PostImageFactory;
use Src\Item\Images\Repositories\ImageRepositories;
use Src\Item\Object\Factories\ObjectPostFactory;
use Src\Item\Object\Repositories\ObjectRepositories;
use Src\Item\Requests\PostObjectRequests;
use Src\Item\ValueObjects\PostItemValueObject;

class OrderRepositories implements OrderRepositoriesInterface
{


    public static function index()
    {
        // TODO: Implement index() method.
    }

    public static function StoreOrder()
    {
        // TODO: Implement StoreOrder() method.
    }

    public static function ConfurmOrderByOwner(Orders $order)
    {
        $order->owner_confirmation_status = 'accepted';
        $order->save();
        return $order;
    }

    public static function ConfurmOrderByCustumer(Orders $order)
    {
        $order->customer_confirmation_status = 'accepted';
        $order->save();
        return $order;
    }

    public static function CustomerOrderConfirmation($orderId)
    {
        CustomerOrderConfirmation::create([
            'order_id' => $orderId,
            'confirmation_date' => now(),
            'status' => 'rejected',
        ]);
    }

    public static function OwnerOrderConfirmation($orderId)
    {
        OwnerOrderConfirmation::create([
            'order_id' => $orderId,
            'confirmation_date' => now(),
            'status' => 'rejected',
        ]);
    }
}
