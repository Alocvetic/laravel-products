<?php

declare(strict_types=1);

namespace App\Repository\Product;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, ModelNotFoundException};

final class ProductReadRepository
{
    public function get(Builder $query, array $pageData): LengthAwarePaginator
    {
        return $query->paginate($pageData['limit'], page: $pageData['number']);
    }

    public function getById(int $id): Product
    {
        return Product::where('id', $id)
            ->firstOr(fn() => throw new ModelNotFoundException());
    }

    public function checkById(int $id): bool
    {
        return Product::where('id', $id)->exists();
    }
}
