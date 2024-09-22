<?php

declare(strict_types=1);

namespace App\Factories\Product;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\DTO\Product\{ProductCollection, ProductDTO};

final class ProductFactory
{
    public function buildCollection(LengthAwarePaginator $products): ProductCollection
    {
        dd($products);
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
}
