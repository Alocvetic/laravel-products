<?php

namespace App\Rules\Auth;

use App\Repository\User\UserReadRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class ExistUserRule implements ValidationRule
{
    public function __construct(
        private readonly string $stage,
    ) {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $hasUser = UserReadRepository::checkByEmail($value);

        if ($this->stage === 'register' && $hasUser) {
            $fail('Пользователь с таким email уже зарегистрирован!');
        }
        if ($this->stage === 'login' && !$hasUser) {
            $fail('Пользователь с таким email не найден!');
        }
    }
}
