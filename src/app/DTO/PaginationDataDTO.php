<?php

declare(strict_types=1);

namespace App\DTO;

final class PaginationDataDTO
{
    public function __construct(
        public int $total,
        public int $limit,
        public int $offset,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
