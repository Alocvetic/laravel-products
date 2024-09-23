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

    public function register(RegisterDataDTO $dataDTO): void
    {
        $this->writeRepository->create($dataDTO);
    }
}
