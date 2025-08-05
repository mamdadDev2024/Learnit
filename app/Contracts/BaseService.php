<?php

namespace App\Contracts;

use Exception;
use App\Contracts\ServiceResponse;
use Illuminate\Contracts\Debug\ExceptionHandler;

class BaseService
{
    /**
     * Execute a service action with optional error handling.
     *
     * @param  \Closure  $action  The primary logic to execute.
     * @param  \Closure|null  $reject  Optional fallback on failure.
     * @return ServiceResponse
     */
    public function __invoke(\Closure $action, \Closure $reject = null): ServiceResponse
    {
        $response = new ServiceResponse();

        try {
            $response->data = $action();
            $response->success = true;
        } catch (Exception $exception) {
            $response->success = false;
            $response->data = $reject ? $reject() : null;

            /** @var ExceptionHandler $handler */
            $handler = app(ExceptionHandler::class);
            $handler->report($exception);
        }

        return $response;
    }
}
