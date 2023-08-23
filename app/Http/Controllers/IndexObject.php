<?php

namespace App\Http\Controllers;

use App\Http\Resources\ObjectRousource;
use App\Models\Item;
use App\Models\ObjectItem;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Repositories\ItemRepositories;

class IndexObject
{
    public function __invoke()
    {
        $query = ItemRepositories::index()
            ->paginate(10);

        return response()->json(
            ObjectRousource::collection($query)
        );

    }
}
