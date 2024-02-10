<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Throwable;

class UserController extends Controller
{
    public function getUserById(Request $request): JsonResponse
    {
        try {
            $handler = new UserController\View\Handler(
                Log::channel(),
            );

            return $handler->handle($request);
        } catch (Throwable $throwable) {
            Log::channel()->error($throwable->getMessage(), [
                'exception' => $throwable,
            ]);

            return new JsonResponse(
                ['message' => 'Internal error'],
                HttpResponse::HTTP_INTERNAL_SERVER_ERROR,
            );
        }
    }
}
