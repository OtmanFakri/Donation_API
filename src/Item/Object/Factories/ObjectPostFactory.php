<?php

namespace Src\Item\Object\Factories;

use Src\Item\ValueObjects\PostObjectValueObjects;

class ObjectPostFactory
{

    public static function CreatObject(array $data) :PostObjectValueObjects
    {
        return new PostObjectValueObjects(

            condition : $data['condition'],
            category_id : $data['category_id'],
        );
    }

}
