<?php

namespace Src\Invitationcode\ValueObjects;

class PostInverterValueObject
{


    public function __construct(
        public string $inviter_id,
        public string $user_id,
    )
    {
    }

    public function toarray(): array
    {
        return [
            'inviter_id' => $this->inviter_id,
            'user_id' => $this->user_id,
        ];
    }
}
