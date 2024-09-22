<?php

declare(strict_types=1);

namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, ModelNotFoundException};

final class CategoryReadRepository
{
    public function get(Builder $query, array $pageData): LengthAwarePaginator
    {
        return $query->paginate($pageData['limit'], page: $pageData['number']);
    }

    public function getById(int $id): Category
    {
        return Category::where('id', $id)
            ->firstOr(fn() => throw new ModelNotFoundException());
    }

    public function checkById(int $id): bool
    {
        return Category::where('id', $id)->exists();
    }
}
