<?php

declare(strict_types=1);

namespace App\Repository\Product;

use App\DTO\Product\{CreateProductDTO, UpdateProductDTO};
use App\Models\Product;

final class ProductWriteRepository
{
    public function create(CreateProductDTO $createProductDTO): void
    {
        $product = new Product($createProductDTO->toArray());
        $product->save();
    }

    public function update(UpdateProductDTO $updateProductDTO): void
    {
        Product::where('id', $updateProductDTO->id)
            ->update($updateProductDTO->toArray());
    }

    public function delete(int $id): void
    {
        Product::where('id', $id)->delete();
    }
}
