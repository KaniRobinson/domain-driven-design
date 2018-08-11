<?php

namespace App\Infrastructure\Exceptions;

use Exception;
use ReflectionClass;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    // Expired Token

    // Resource Not Found

    // Authorisation

    protected function handleException($request, $exception)
    {
        $reflect = new ReflectionClass($exception);

        switch($reflect->getShortName()) {
            // Token Expired Exception
            case "AuthenticationException":
                return response()->json([
                    'error' => [
                        'token' => [__('auth.token_expired')]
                    ]
                    ], 403);
                break;

            // Resource not found exception
            case "ModelNotFoundException":
                return response()->json([
                    'error' => [
                        'token' => [__('auth.model_not_found')]
                    ]
                ], 404);
                break;

            // Unauthorised Access Exception
            case "AuthorizationException":
                return response()->json([
                    'error' => [
                        'token' => [__('auth.not_allowed')]
                    ]
                ], 403);
                break;
        }

        return parent::render($request, $exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($request->wantsJson()) {
            return $this->handleException($request, $exception);
        }

        return parent::render($request, $exception);
    }
}
