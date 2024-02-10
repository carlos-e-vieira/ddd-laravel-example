<?php

namespace Domain\Module\User\View;

use Domain\Module\User\View\Entity\Request\UserRequest;

final readonly class Request
{
    public function __construct(
        private UserRequest $userRequest,
    ) {  
    }

    public function getUserRequest(): UserRequest
    {
        return $this->userRequest;
    }
}
