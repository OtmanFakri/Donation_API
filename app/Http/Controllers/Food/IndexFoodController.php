<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Food\Repositories\FoodRepositories;

class IndexFoodController extends Controller
{

    public function __invoke(Request $request)
    {
        $query =FoodRepositories::Index()->paginate(25);

        //$tt=FoodItem::all();
        return response()->json(
            $query,
        );
    }
}
