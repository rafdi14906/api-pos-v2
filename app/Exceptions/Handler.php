<?php

namespace App\Exceptions;

use App\Traits\Response;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use Response;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        // $this->reportable(function (NotFoundHttpException $e) {
        //     Bugsnag::notifyException($e);
        // });
        
        $this->reportable(function (UnauthorizedException $e) {
            Bugsnag::notifyException($e);
        });

        $this->reportable(function (Throwable $e) {
            Bugsnag::notifyException($e);
        });

        $this->renderable(function (NotFoundHttpException $e) {
            return $this->error($e->getMessage() == '' ? 'Not Found' : $e->getMessage(), 404, $e->getTraceAsString());
        });

        $this->renderable(function (UnauthorizedException $e) {
            return $this->error($e->getMessage() == '' ? 'Unauthorized' : $e->getMessage(), 401, $e->getTraceAsString());
        });

        $this->renderable(function (Throwable $e) {
            return $this->error($e->getMessage(), 500, $e->getTraceAsString());
        });
    }
}
