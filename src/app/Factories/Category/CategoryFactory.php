<?php

declare(strict_types=1);

namespace App\Factories\Category;

use App\DTO\PaginationDataDTO;
use App\DTO\Category\{CategoryCollection, CategoryDTO};
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class CategoryFactory
{
    public function buildCollection(LengthAwarePaginator $categories): CategoryCollection
    {
        $categoryCollection = new CategoryCollection();

        foreach ($categories->items() as $category) {
            $categoryDTO = $this->buildDto($category);
            $categoryCollection->setCategory($categoryDTO);
        }

        $paginationDataDTO = $this->buildPaginationDataDto($categories);
        $categoryCollection->setPaginationDTO($paginationDataDTO);

        return $categoryCollection;
    }

    public function buildDto(Category $category): CategoryDTO
    {
        return new CategoryDTO(
            $category->id,
            $category->name,
        );
    }

    protected function buildPaginationDataDto(LengthAwarePaginator $categories): PaginationDataDTO
    {
        return new PaginationDataDTO(
            $categories->total(),
            $categories->perPage(),
            $categories->currentPage(),
            $categories->lastPage(),
        );
    }
}
