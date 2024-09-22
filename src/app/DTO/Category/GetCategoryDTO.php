<?php

declare(strict_types=1);

namespace App\DTO\Category;

final class GetCategoryDTO
{
    public function __construct(
        public int $limit,
        public int $offset,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
