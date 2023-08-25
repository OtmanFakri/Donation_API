<?php

namespace Src\Item\Object\Repositories;

use Src\Item\Object\Jobs\StoreObjectItem;
use Src\Item\Requests\PostObjectRequests;

class ObjectRepositories implements ObjectRepositoriesInterfaces
{

    public static function Store($postObject,$postItem)
    {
        $object = dispatch(new StoreObjectItem($postObject->toArray(), $postItem->id));
    }
}
