<?php

namespace Src\Item\Repositories;

use App\Models\Item;
use Spatie\QueryBuilder\QueryBuilder;

interface ItemRepositoriesInterface
{
    public static function index() :QueryBuilder;

    public static function ObjectMe($user) :QueryBuilder;


}
