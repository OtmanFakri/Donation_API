<?php

namespace Src\Item\Repositories;

use App\Models\Item;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Requests\PostObjectRequests;

interface ItemRepositoriesInterface
{
    public static function index() :QueryBuilder;
    public static function ObjectShow(Item $item) ;
    public static function ObjectMe($user) :QueryBuilder;

    public static function Store(PostObjectRequests $request);

    public static function StroeItem(PostObjectRequests $request) :Item;

}
