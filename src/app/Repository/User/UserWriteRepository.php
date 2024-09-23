<?php

declare(strict_types=1);

namespace App\Repository\User;

use App\DTO\Auth\RegisterDataDTO;
use App\Models\User;

final class UserWriteRepository
{
    public function create(RegisterDataDTO $registerDataDTO): void
    {
        $user = new User($registerDataDTO->toArray());
        $user->save();
    }
}
