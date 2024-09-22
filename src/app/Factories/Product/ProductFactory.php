<?php

declare(strict_types=1);

namespace App\Factories\Product;

use App\DTO\PaginationDataDTO;
use App\DTO\Product\{ProductCollection, ProductDTO};
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class ProductFactory
{
    public function buildCollection(LengthAwarePaginator $products): ProductCollection
    {
        $productCollection = new ProductCollection();

        foreach ($products->items() as $product) {
            $productDTO = $this->buildDto($product);
            $productCollection->setProduct($productDTO);
        }

        $paginationDataDTO = $this->buildPaginationDataDto($products);
        $productCollection->setPaginationDTO($paginationDataDTO);

        return $productCollection;
    }

    public function buildDto(Product $product): ProductDTO
    {
        return new ProductDTO(
            $product->id,
            $product->name,
            $product->description,
            $product->price,
            $product->category_id,
        );
    }

    protected function buildPaginationDataDto(LengthAwarePaginator $products): PaginationDataDTO
    {
        return new PaginationDataDTO(
            $products->total(),
            $products->perPage(),
            $products->currentPage(),
            $products->lastPage(),
        );
    }
}
