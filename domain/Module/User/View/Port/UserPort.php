<?php

namespace Domain\Module\User\View\Port;

use Domain\Module\User\View\Entity\Request\UserRequest;
use Domain\Module\User\View\Entity\UserEntity;

interface UserPort
{
    public function getUserById(UserRequest $userRequest): ?UserEntity;
}
