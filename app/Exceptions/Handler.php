<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Spatie\Permission\Exceptions\UnauthorizedException;

/**
 * Class Handler.
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        GeneralException::class,
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
     * @param Exception $exception
     *
     * @throws Exception
     * @return mixed|void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if (!$exception instanceof UnauthorizedException) {
            return parent::render($request, $exception);
        }

        if ($this->isAdminRequest($request)) {
            auth()->logout();
            return redirect()->route('frontend.auth.login.admin');
        }

        return redirect()
            ->route(home_route())
            ->withFlashDanger(__('auth.general_error'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException  $exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        // If access to admin is wanted
        if ($this->isAdminRequest($request)) {
            return redirect()->guest(route('frontend.auth.login.admin'));
        }
        return redirect()->guest(route('frontend.auth.login'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * 
     * @return boolean
     */
    private function isAdminRequest(Request $request)
    {
        return substr($request->path(), 0, 5) === 'admin';
    }
}
