<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Exceptions\Auth\LoginException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\JsonResponse;

final class LoginController extends Controller
{
    public function __construct(
        private readonly LoginService $loginService
    ) {
    }

    /**
     * @throws LoginException
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $dataDto = $request->toDto();
        $token = $this->loginService->login($dataDto);

        $responseData = [
            'token' => $token
        ];

        return ResponseHelper::build($responseData, message: 'Пользователь успешно авторизован!');
    }
}
