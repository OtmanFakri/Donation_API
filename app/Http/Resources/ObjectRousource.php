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
                        'id'=> $this->object->id,
                        'condition'=> $this->object->condition,
                        'category_id'=> $this->object->category_id,
                        'RelationShip' => [
                            'category' => [
                                'id'=> $this->object->category->id,
                                'name'=> $this->object->category->name,
                                'parent_id'=> $this->object->category->parent_id,
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
