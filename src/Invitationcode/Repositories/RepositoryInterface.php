<?php

namespace Src\Invitationcode\Repositories;

use Src\Invitationcode\ValueObjects\PostInverterValueObject;

interface RepositoryInterface
{
    public static function Create(PostInverterValueObject $data) :void;
    public static function showInveted(string $userId);

}
