<?php

namespace Src\Order\ValueObjects;

class PostOrderValueObject
{


    public function __construct(
        public int $customer_id,
        public int $owner_id,
        public int $item_id,
        public string $order_date,
    )
    {
    }

    public function toarray(): array
    {
        return [
            'customer_id' => $this->customer_id,
            'owner_id' => $this->owner_id,
            'item_id' => $this->item_id,
            'order_date' => $this->order_date,
        ];
    }
}
