<?php

declare(strict_types=1);

namespace App\DTO;

final class PaginationDataDTO
{
    public function __construct(
        public int $total,
        public int $perPage,
        public int $currentPage,
        public int $lastPage,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
