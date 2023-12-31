<?php

namespace App\Http\Controllers\Object;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Src\Item\Repositories\ItemRepositories;
use Src\Item\Requests\PostObjectRequests;

class PostObjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function __invoke(PostObjectRequests $request)
    {
        //Authorization
        $this->authorize('create', Item::class);

        ItemRepositories::Store($request);

        return response()->json([
             'Object has been created',
        ], 201);
    }
}
