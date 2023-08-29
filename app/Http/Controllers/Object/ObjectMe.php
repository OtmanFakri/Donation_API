<?php

namespace App\Http\Controllers\Object;


use App\Http\Controllers\Controller;
use Src\Item\Object\Resources\ObjectRousource;
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
            ->latest()
            ->paginate(10);

        return response()->json(
            ObjectRousource::collection($query)
            //$query
        );
    }
}
