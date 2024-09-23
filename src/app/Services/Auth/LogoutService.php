<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Services\TokenService;
use Illuminate\Http\Request;

final class LogoutService
{
    public function __construct(
        protected readonly TokenService $tokenService,
    ) {
    }

    public function logout(Request $request): void
    {
        $user = $request->user();
        $this->tokenService->delete($user);
    }
}
