<?php

declare(strict_types=1);

namespace App\DTO\Product;

use App\DTO\PaginationDataDTO;

final class ProductCollection
{
    private array $products = [];

    private PaginationDataDTO $paginationDataDTO;

    public function setPaginationDTO(PaginationDataDTO $paginationDataDTO): void
    {
        $this->paginationDataDTO = $paginationDataDTO;
    }

    public function setProduct(ProductDTO $productDTO): void
    {
        $this->products[] = $productDTO;
    }

    public function toArray(): array
    {
        $productItems = [];
        foreach ($this->products as $product) {
            $productItems[] = $product->toArray();
        }

        return [
            'items' => $productItems,
            'paginationData' => $this->paginationDataDTO->toArray(),
        ];
    }
}
