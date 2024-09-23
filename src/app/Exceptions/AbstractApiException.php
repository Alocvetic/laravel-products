<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

abstract class AbstractApiException extends Exception
{
    public function __construct(string $message = null, int $code = 500)
    {
        $message = $message === null ? "Произошла ошибка! Мы уже работаем над ее устранением!" : $message;
        parent::__construct($message, $code);
    }
}
