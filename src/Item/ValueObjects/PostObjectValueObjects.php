<?php

namespace Src\Item\ValueObjects;

class PostObjectValueObjects
{
    public function __construct(

         public string $condition,
         public string $category_id,
        //public ?int $item_id,
    )
    {
    }

    public function toArray(): array
    {

        return  [
            'condition' => $this->condition,
            'category_id' => $this->category_id,

        ];
    }
}
