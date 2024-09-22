<?php

declare(strict_types=1);

namespace App\Factories\Category;

use App\DTO\Category\{CategoryCollection, CategoryDTO};
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class CategoryFactory
{
    public function buildCollection(LengthAwarePaginator $categories): CategoryCollection
    {
        dd($categories);
    }

    public function buildDto(Category $category): CategoryDTO
    {
        return new CategoryDTO(
            $category->id,
            $category->name,
        );
    }
}
