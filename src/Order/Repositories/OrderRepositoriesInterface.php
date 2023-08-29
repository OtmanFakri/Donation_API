<?php

namespace Src\Order\Repositories;

use App\Models\Item;
use App\Models\Orders;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Requests\PostObjectRequests;
use Src\Item\ValueObjects\PostItemValueObject;

interface OrderRepositoriesInterface
{
   public static function index();
   public static function StoreOrder();
   public static function ConfurmOrderByOwner(Orders $order);
   public static function ConfurmOrderByCustumer(Orders $order);
   public static function CustomerOrderConfirmation($orderId);
    public static function OwnerOrderConfirmation($orderId);
}
