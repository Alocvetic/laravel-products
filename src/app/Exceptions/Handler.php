<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $e)
    {
        dd($e->getCode(), [$e->getMessage()]);
        if ($request->wantsJson()) {
            if ($e instanceof ValidationException) {
                $status = 422;
                $data = $e->errors();
                $message = 'Ошибка валидации данных';
            } elseif ($e instanceof ModelNotFoundException) {
                $status = 404;
                $data = [];
                $message = 'Запись не найдена';
            } else {
                $status = $e->getCode();
                $data = [$e->getMessage()];
                $message = 'Произошла ошибка! Мы уже работаем над ее устранением.';
            }

            return ResponseHelper::build(
                $data,
                $status,
                $message
            );
        }

        return parent::render($request, $e);
    }

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });
    }
}
