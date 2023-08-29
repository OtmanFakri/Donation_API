<?php

namespace Src\Item\Food\Repositories;

interface FoodRepositoriesInterfaces
{
    public static function Store($foodObject,$foodItem);
    public static function Index();
    public static function Show($item);
}
