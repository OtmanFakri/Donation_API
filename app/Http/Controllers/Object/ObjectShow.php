<?php

namespace App\Http\Controllers\Object;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Repositories\ItemRepositories;

class ObjectShow extends Controller
{

    public function __invoke(Request $request,Item $item)
    {

        $query = ItemRepositories::ObjectShow($item);

        return response()->json(
            $query
        );
    }
}
