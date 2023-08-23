<?php

namespace Src\Invitationcode\Factories;

use Src\Invitationcode\ValueObjects\PostInverterValueObject;

class InverterFactory
{
    public static function Create(array $data){
        return new PostInverterValueObject(
            inviter_id:$data['inviter_id'],
            user_id:$data['user_id'],
        );

    }

}
