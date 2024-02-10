<?php

namespace Domain\Shared\Exception;

use Exception;

class UserNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('User not found.');
    }
}
