<?php

declare(strict_types=1);

namespace App\DTO\Product;

final class UpdateProductDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $description,
        public int $price,
        public int $category_id,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
