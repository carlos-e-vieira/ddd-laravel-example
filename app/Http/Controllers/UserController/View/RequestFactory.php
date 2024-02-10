<?php

namespace App\Http\Controllers\UserController\View;

use Domain\Module\User\View\Entity\Request\UserRequest;
use Domain\Module\User\View\Request;
use Illuminate\Http\Request as HttpRequest;

abstract readonly class RequestFactory
{
    public static function create(HttpRequest $request): Request
    {
        return new Request(
            self::parseUserEntity($request),
        );
    }

    private static function parseUserEntity(HttpRequest $request): UserRequest
    {
        return new UserRequest(
            $request->route('userId'),
        );
    }
}
