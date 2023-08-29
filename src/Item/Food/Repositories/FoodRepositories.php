<?php

namespace Src\Item\Food\Repositories;

use App\Models\Item;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Repositories\ItemRepositories;

class FoodRepositories implements FoodRepositoriesInterfaces
{

    public static function Store($foodObject, $foodItem)
    {
        //$object = dispatch(new StoreObjectItem($postObject->toArray(), $postItem->id));
    }

    public static function Index()
    {
        $query = QueryBuilder::for(
            Item::class
        )
            ->has('food')
            ->with([
                'food',

            ])
            ->latest();


        return $query;
    }


    public static function Show($item){
        $article=QueryBuilder::for(
            Item::where('id', $item->id)
        )
            ->has('food')
            ->with([
                'food',
                'ItemImages'
            ])
            ->firstOrFail();
        return $article;
    }
}
