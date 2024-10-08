<?php

declare(strict_types=1);

namespace App\Exceptions\Auth;

use App\Exceptions\AbstractApiException;

final class LoginException extends AbstractApiException
{
    public function __construct()
    {
        parent::__construct("Неверный email или пароль!", 422);
    }
}
