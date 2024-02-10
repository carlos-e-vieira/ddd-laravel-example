<?php

namespace App\Http\Controllers\UserController\View;

use Domain\Shared\Exception\UserNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Throwable;

final readonly class Handler
{
    public function __construct(
        private LoggerInterface $logger,
    ) {
    }

    public function handle(Request $request): JsonResponse
    {
        try {
            $response = ServiceFactory::create()
                ->execute(RequestFactory::create($request));

            return new JsonResponse(
                $this->data($response->toArray()),
                HttpResponse::HTTP_OK,
            );
        } catch (UserNotFoundException $exception) {
            return new JsonResponse(
                $this->error($exception->getMessage()),
                HttpResponse::HTTP_NOT_FOUND,
            );
        } catch (Throwable $throwable) {
            $this->logger->error('Internal error.', [
                'request' => [
                    'headers' => $request->headers->all(),
                    'input' => $request->input(),
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                ],
                'throwable' => $throwable,
            ]);
        }

        return new JsonResponse([
            $this->error('Internal error'),
            HttpResponse::HTTP_INTERNAL_SERVER_ERROR,
        ]);
    }

    private function data(array $data): array
    {
        return [
            'data' => $data,
            'meta' => (object)[],
        ];
    }

    private function error(string $message): array
    {
        return [
            'message' => $message,
        ];
    }
}
