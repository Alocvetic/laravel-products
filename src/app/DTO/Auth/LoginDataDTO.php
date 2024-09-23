<?php

declare(strict_types=1);

namespace App\DTO\Auth;

final class LoginDataDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
