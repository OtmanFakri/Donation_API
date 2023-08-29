<?php

namespace Src\Order\Factories;

use Src\Order\ValueObjects\PostOrderValueObject;

class PostOrderFactory
{

    public static function Create(array $data):PostOrderValueObject
    {
        return new PostOrderValueObject(
            customer_id: $data['customer_id'],
            owner_id: auth()->id(),
            item_id: $data['item_id'],
            order_date: now()->toDateTimeString(),
        );
    }

}
