<?php

declare(strict_types=1);

namespace App\Repository\User;

use App\DTO\Auth\LoginDataDTO;
use App\Exceptions\Auth\LoginException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class UserReadRepository
{
    public static function checkByEmail(string $email)
    {
        return User::where('email', $email)->exists();
    }

    /**
     * @throws LoginException
     */
    public function login(LoginDataDTO $loginDataDTO): User
    {
        $user = User::where('email', $loginDataDTO->email)->first();

        if ($user && Hash::check($loginDataDTO->password, $user->password)) {
            return $user;
        }

        throw new LoginException();
    }
}
