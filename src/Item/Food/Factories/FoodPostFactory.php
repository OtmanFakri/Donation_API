<?php

namespace Src\Item\Food\Factories;

use Src\Item\ValueObjects\PostObjectValueObjects;

class FoodPostFactory
{

    public static function CreatObject(array $data) :PostObjectValueObjects
    {
        return new PostObjectValueObjects(

            condition : $data['condition'],
            category_id : $data['category_id'],
        );
    }

}
