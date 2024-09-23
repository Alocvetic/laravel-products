<?php

declare(strict_types=1);

namespace App\Exceptions\Auth;

use Exception;

final class LoginException extends Exception
{
    public function __construct()
    {
        parent::__construct("Неверный email или пароль!", 422);
    }
}
