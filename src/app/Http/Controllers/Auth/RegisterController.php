<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterService;
use Illuminate\Http\JsonResponse;

final class RegisterController extends Controller
{
    public function __construct(
        private readonly RegisterService $registerService
    ) {
    }

    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $dataDto = $request->toDto();
        $responseData = ($this->registerService)($dataDto);

        return ResponseHelper::build($responseData['data'], message: $responseData['message']);
    }
}
