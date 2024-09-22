<?php

declare(strict_types=1);

namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, ModelNotFoundException};

final class CategoryReadRepository
{
    public function get(Builder $query): LengthAwarePaginator
    {
        return $query->paginate(perPage: $query->limit);
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
