<?php

namespace Domain\Module\User\View;

use Domain\Module\User\View\Port\UserPort;
use Domain\Shared\Exception\UserNotFoundException;

final readonly class Service
{
    public function __construct(
        private UserPort $userPort
    ) {  
    }

    public function execute(Request $request): Response
    {
        $user = $this->userPort->getUserById($request->getUserRequest());

        if (!$user) {
            throw new UserNotFoundException();
        }

        return new Response($user);
    }
}
