<?php

namespace Src\Item\Resources;
use App\Http\Resources\FoodResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Src\Item\Images\Resources\ImageResources;

class ItemResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'address' => $this->address,
            'availabilities' => $this->availabilities,
            'booked' => $this->booked,
            'images' => $this->ItemImages[0]->image_path,
            'score_cost' => $this->score_cost,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            "RelationsEp"=>[
                'food' => new FoodResource($this->whenLoaded('food')),
                'Images'=>collect($this->ItemImages)->map(function ($image) {
                    return [
                        new ImageResources($image)
                    ];
                })->toArray(),
                //'object' => new ObjectResource($this->whenLoaded('object')),]
        ]];
    }
}
