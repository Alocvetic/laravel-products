<?php

declare(strict_types=1);

namespace App\DTO\Category;

final class CreateCategoryDTO
{
    public function __construct(
        public string $name,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
