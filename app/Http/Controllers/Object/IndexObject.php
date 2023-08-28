<?php

namespace App\Http\Controllers\Object;

use App\Http\Resources\ObjectRousource;
use Src\Item\Repositories\ItemRepositories;

class IndexObject
{
    public function __invoke()
    {
        $query = ItemRepositories::index()
            ->latest()
            ->paginate(10);

        return response()->json(
            ObjectRousource::collection($query)
        );

    }
}
