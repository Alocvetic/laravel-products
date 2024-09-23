<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\DTO\Auth\LoginDataDTO;
use App\Exceptions\Auth\LoginException;
use App\Repository\User\UserReadRepository;

final class LoginService
{
    public function __construct(
        protected readonly UserReadRepository $readRepository,
    ) {
    }

    /**
     * @throws LoginException
     */
    public function __invoke(LoginDataDTO $dataDTO): array
    {
        $user = $this->readRepository->login($dataDTO);

        $user->tokens()->delete();
        $token = $user->createToken('user');

        return [
            'data' => [
                'token' => $token->plainTextToken
            ],
            'message' => 'Пользователь успешно авторизован!'
        ];
    }
}
