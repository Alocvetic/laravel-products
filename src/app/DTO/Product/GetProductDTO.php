<?php

declare(strict_types=1);

namespace App\DTO\Product;

final class GetProductDTO
{
    public function __construct(
        public int $page_limit,
        public int $page_number,
        public ?string $sort = null,
        public ?int $filter_category_id = null,
        public ?int $filter_price_from = null,
        public ?int $filter_price_to = null,
        public ?string $filter_search = null,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    public function getPageData(): array
    {
        return [
            'number' => $this->page_number,
            'limit' => $this->page_limit,
        ];
    }
}
