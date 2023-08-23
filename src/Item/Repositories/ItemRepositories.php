<?php

namespace Src\Item\Repositories;

use App\Models\Item;
use Spatie\QueryBuilder\QueryBuilder;

class ItemRepositories implements ItemRepositoriesInterface
{

    public static function index(): QueryBuilder
    {
        $query = QueryBuilder::for(
            Item::class
        )
            ->with([
                'Object',
                'Object.Category',
            ]);

        return $query;
    }

    public static function ObjectMe( $user): QueryBuilder
    {
        $query = QueryBuilder::for(
            $user->items()
        )
            ->with('Object');

        return $query;
        // TODO: Implement ObjectMe() method.
    }
}
