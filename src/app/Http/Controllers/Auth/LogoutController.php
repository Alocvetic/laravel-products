<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Services\Auth\LogoutService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class LogoutController extends Controller
{
    public function __construct(
        private readonly LogoutService $logoutService,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $responseData = ($this->logoutService)($request);

        return ResponseHelper::build($responseData['data'], message: $responseData['message']);
    }
}
