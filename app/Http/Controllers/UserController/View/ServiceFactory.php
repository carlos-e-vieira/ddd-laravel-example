<?php

namespace App\Http\Controllers\UserController\View;

use Adapter\Module\User\View\UserEloquentAdapter;
use Domain\Module\User\View\Service;

abstract readonly class ServiceFactory
{
    public static function create(): Service
    {
        return new Service(
            new UserEloquentAdapter(),
        );
    }
}
