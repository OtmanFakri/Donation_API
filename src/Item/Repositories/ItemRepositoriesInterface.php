<?php

namespace Src\Item\Repositories;

use App\Models\Item;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Item\Requests\PostObjectRequests;
use Src\Item\ValueObjects\PostItemValueObject;

interface ItemRepositoriesInterface
{
    public static function index() :QueryBuilder;

    public static function ObjectShow(Item $item);

    public static function Objectdeleted($item) :bool;

    public static function ObjectMe($user) :QueryBuilder;

    public static function Store(PostObjectRequests $request);

    public static function StroeItem(PostItemValueObject $request) :Item;

    public static function Testindex($relatedModels = []) ;
}
