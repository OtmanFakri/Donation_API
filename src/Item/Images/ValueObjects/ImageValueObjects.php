<?php

namespace Src\Item\Images\ValueObjects;

class ImageValueObjects
{


    public function __construct(
        public $image_path,
    )
    {
    }

    public function toarray()
    {
        return [
            'image_path' => $this->image_path,
        ];
    }
}
