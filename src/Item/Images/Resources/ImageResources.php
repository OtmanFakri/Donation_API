<?php

namespace Src\Item\Images\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'path' => $this->image_path,
        ];
    }

}
