<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ((env('APP_ENV') == 'production') || (env('APP_ENV') == 'staging')) {

            switch (true) {
                case $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException:
                    if ($request->ajax()) {
                        return  response()->json(['success' => false, 'data'=> [], 'message' => 'The requested object could not be found'], 422);
                    }

                    abort(422);
                    
                    break;
                
                default:
                    return parent::render($request, $e);
                    break;
            }

        } else {
            return parent::render($request, $e);
        }
    }
}
