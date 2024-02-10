<?php

namespace Domain\Module\User\View;

use Domain\Module\User\View\Entity\UserEntity;
use Illuminate\Contracts\Support\Arrayable;

final readonly class Response implements Arrayable
{
    public function __construct(
        private UserEntity $userEntity,
    ) {  
    }

    public function toArray(): array
    {
        return [
            'user' => $this->userEntity->toArray(),
        ];
    }
}
