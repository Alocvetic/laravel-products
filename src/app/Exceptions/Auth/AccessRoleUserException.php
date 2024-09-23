<?php

declare(strict_types=1);

namespace App\Exceptions\Auth;

use App\Exceptions\AbstractApiException;

final class AccessRoleUserException extends AbstractApiException
{
    public function __construct()
    {
        parent::__construct('У вас нет прав доступа!', 403);
    }
}
