<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Food\Repositories\FoodRepositories;
use Src\Item\Resources\ItemResource;

class ShowFoodController extends Controller
{


    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function __invoke(Request $request , Item $item)
    {
        $article=FoodRepositories::Show($item);

        return response()->json(
            ItemResource::make($article)
        );

    }
}
