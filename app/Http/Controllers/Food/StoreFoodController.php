<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Src\Item\Factories\ItemPostFactory;
use Src\Item\Food\Requests\PostFoodRequests;
use Src\Item\Repositories\ItemRepositories;

class StoreFoodController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(PostFoodRequests $request)
    {

        //Autherxation
        $this->authorize('create', Item::class);



        $ItemRef=ItemRepositories::StroeItem(ItemPostFactory::CreatItem($request->validated()));

        $ItemRef->food()->create([
            'expiration_date' => $request->DateExpiry,
        ]);

        return response()->json([
            'message' => 'Food Item Created Successfully',
            'data' => $ItemRef
        ], 201);

    }
}
