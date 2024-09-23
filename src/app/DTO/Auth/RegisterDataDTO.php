<?php

declare(strict_types=1);

namespace App\DTO\Auth;

use Illuminate\Support\Facades\Hash;

final class RegisterDataDTO
{
    public function __construct(
        public string $name,
        public string $role,
        public string $email,
        public string $password,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];
    }


}
