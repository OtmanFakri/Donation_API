<?php

namespace App\Http\Controllers;


use App\Models\Item;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Repositories\ItemRepositories;

class ObjectMe extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');

    }

    public function __invoke()
    {
        $user = auth()->user();

        $query=ItemRepositories::ObjectMe($user)
            ->paginate(10);

        return response()->json(
            $query
        );
    }
}
