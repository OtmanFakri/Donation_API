<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ObjectRousource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'type' => 'objects',
            'id' => (string)$this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'address' => $this->price,
                'user_id'=> $this->user_id,
                'availabilities'=> $this->availabilities,
                'RelationShip' => [
                    'object' => [
                        'id'=> $this->object->id ?? null,
                        'condition'=> $this->object->condition ?? null,
                        'category_id'=> $this->object->category_id ?? null,
                        'RelationShip' => [
                            'category' => [
                                'id'=> $this->object->category->id ?? null,
                                'name'=> $this->object->category->name ?? null,
                                'parent_id'=> $this->object->category->parent_id ?? null,
                            ],
                            'item_images' => collect($this->ItemImages)->map(function ($image) {
                                return [
                                    'id' => $image->id,
                                    'path' => $image->image_path,
                                ];
                            })->toArray(),
                        ],
                    ],
                ],
            ],
        ];
    }
}
