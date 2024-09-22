<?php

declare(strict_types=1);

namespace App\DTO\Category;

final class UpdateCategoryDTO
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
