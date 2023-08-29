<?php

namespace Src\Item\Factories;

use Src\Item\ValueObjects\PostItemValueObject;
use Src\Item\ValueObjects\PostObjectValueObjects;

class ItemPostFactory
{
    public static function CreatItem(array $data): PostItemValueObject
    {
        return new PostItemValueObject(
            name: $data['name'],
            user_id: auth()->user()->id,
            description: $data['description'],
            address: $data['address'],
            availabilities: $data['availabilities'],
            booked: $data['booked'],
            score_cost: $data['score_cost'],
            image_path: $data['image_path'],
        );
    }

}
