<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

final class TokenService
{
    public function createNew(User $user): string
    {
        $user->tokens()->delete();
        $token = $user->createToken('user', ["role:$user->role"]);

        return $token->plainTextToken;
    }

    public function delete(User $user): void
    {
        $user->currentAccessToken()->delete();
    }
}
