<?php

namespace Src\Invitationcode\Repositories;

use App\Models\InviterUser;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;
use Src\Invitationcode\ValueObjects\PostInverterValueObject;

class Repository implements RepositoryInterface
{

    public static function Create(PostInverterValueObject $data): void
    {
        InviterUser::create($data->toarray());
    }

    public static function showInveted(string $userId)
    {
        $query = QueryBuilder::for(User::class)
            ->whereHas('invitingUsers', function ($query) use ($userId) {
                $query->where('inviter_id', $userId);
            })->paginate(25);
        return $query;
    }
}
