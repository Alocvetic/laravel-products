<?php

declare(strict_types=1);

namespace App\Services\Auth;

use Illuminate\Http\Request;

final class LogoutService
{
    public function __invoke(Request $request): array
    {
        $user = $request->user();

        $user->currentAccessToken()->delete();

        return [
            'data' => null,
            'message' => 'Пользователь успешно разлогинен!'
        ];
    }
}
