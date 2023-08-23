<?php

namespace Src\Invitationcode\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvetedRousource extends JsonResource
{

    public function toArray($request) : array
    {
        return [

                'type' => 'inveted',
                'id' => (string)$this->id,
                'attributes' => [
                    'name' => $this->name,
                    'Avatar' => $this->avatar,
                ],

        ];
    }
}
