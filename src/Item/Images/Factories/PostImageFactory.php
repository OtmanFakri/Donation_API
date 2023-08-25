<?php

namespace Src\Item\Images\Factories;

use Src\Item\Images\ValueObjects\ImageValueObjects;

class PostImageFactory
{

    public static function create(array $imagePaths)
    {
      return new ImageValueObjects(
          image_path: $imagePaths['image_path'],);
    }

}
