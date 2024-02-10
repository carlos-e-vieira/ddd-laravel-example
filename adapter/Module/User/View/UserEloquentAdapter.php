<?php

namespace Adapter\Module\User\View;

use App\Models\User;
use Domain\Module\User\View\Entity\Request\UserRequest;
use Domain\Module\User\View\Entity\UserEntity;
use Domain\Module\User\View\Port\UserPort;

final readonly class UserEloquentAdapter implements UserPort
{
    public function getUserById(UserRequest $userRequest): ?UserEntity
    {
        $userDb = User::query()
            ->select([
                'users.id',
                'users.name', 
                'users.email', 
            ])
            ->find($userRequest->getId());

        if (!$userDb) {
            return null;
        }

        return new UserEntity(
            $userDb->id,
            $userDb->name,
            $userDb->email,
        );
    }
}
