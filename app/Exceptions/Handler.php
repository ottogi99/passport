<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Exception;
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
     *
     * @throws \Exception
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
        Log::index('In render()');
        Log::debug('isAjax:'.$request->ajax());

        if ($request->ajax()) {
            if (!empty($exception)) {
                $response = [
                    'error' => 'Sorry, can not execute your request',
                ];

                if (config('app.debug')) {
                    $reponse['exception'] = get_class($exception);
                    $reponse['message'] = $exception->getMessage();
                    $reponse['trace'] = $exception->getTrace();
                }

                $status = 400;

                if ($exception instanceof ValidationException){
                    return $this->convertValidationExceptionToResponse($exception, $request);       
                    // is it authentication exception
                } else if($exception instanceof AuthenticationException){
                    $status = 401;
                    $response['error'] = 'Can not finish authentication!';
                    //is it DB exception
                } else if ($exception instanceof \PDOException) {
                    $status = 500;
                    $reponse['error'] = 'Can not finish your query requesst!';
                } else if ($this->isHttpException($exception)) {
                    $stauts = $exception->getStatusCode();
                    $reponse['error'] = 'Request error!';
                } else {
                    $status = method_exist($exception, 'getStatusCode') ? $exception->getStatusCode() : 400;
                }

                return response()->json($response, $status);
            }
        }

        return parent::render($request, $exception);
    }
}
