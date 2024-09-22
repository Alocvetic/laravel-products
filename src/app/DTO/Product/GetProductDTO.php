<?php

declare(strict_types=1);

namespace App\DTO\Product;

final class GetProductDTO
{
    public function __construct(
        public int $limit,
        public int $offset,
        public ?string $sort = null,
        public ?int $filter_category_id = null,
        public ?int $filter_price_from = null,
        public ?int $filter_price_to = null,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
