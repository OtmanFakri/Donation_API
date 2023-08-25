<?php

namespace Src\Item\Images\Repositories;

interface ImageRepositoriesInterfaces
{
     public static function storeImages($imagePaths);
    public static function uploadImage($imageData);
}
