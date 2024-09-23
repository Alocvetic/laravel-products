<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\DTO\Auth\RegisterDataDTO;
use App\Repository\User\UserWriteRepository;

final class RegisterService
{
    public function __construct(
        protected readonly UserWriteRepository $writeRepository,
    ) {
    }

    public function __invoke(RegisterDataDTO $dataDTO): array
    {
        $this->writeRepository->create($dataDTO);

        return [
            'data' => null,
            'message' => 'Пользователь успешно зарегистрирован!'
        ];
    }
}
