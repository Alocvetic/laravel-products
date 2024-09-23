<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\DTO\Auth\LoginDataDTO;
use App\Exceptions\Auth\LoginException;
use App\Repository\User\UserReadRepository;
use App\Services\TokenService;

final class LoginService
{
    public function __construct(
        protected readonly UserReadRepository $readRepository,
        protected readonly TokenService $tokenService,
    ) {
    }

    /**
     * @throws LoginException
     */
    public function login(LoginDataDTO $dataDTO): string
    {
        $user = $this->readRepository->login($dataDTO);

        return $this->tokenService->createNew($user);
    }
}
