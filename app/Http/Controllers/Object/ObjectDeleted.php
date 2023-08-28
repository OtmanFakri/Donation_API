<?php

namespace App\Http\Controllers\Object;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Src\Item\Repositories\ItemRepositories;

class ObjectDeleted extends Controller
{

    public function __invoke(Request $request , Item $item)
    {
        $isDeleted=ItemRepositories::Objectdeleted($item);
        if ($isDeleted){
            return response()->json([
                'Object has been deleted',
            ], 200);
        }
        return response()->json([
            'Object has not been deleted',
        ], 400);

    }
}
