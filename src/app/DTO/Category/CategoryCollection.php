<?php

declare(strict_types=1);

namespace App\DTO\Category;

use App\DTO\PaginationDataDTO;

final class CategoryCollection
{
    private array $categories = [];

    private PaginationDataDTO $paginationDataDTO;

    public function setPaginationDTO(PaginationDataDTO $paginationDataDTO): void
    {
        $this->paginationDataDTO = $paginationDataDTO;
    }

    public function setCategory(CategoryDTO $categoryDTO): void
    {
        $this->categories[] = $categoryDTO;
    }

    public function toArray(): array
    {
        $categoryItems = [];
        foreach ($this->categories as $category) {
            $categoryItems[] = $category->toArray();
        }

        return [
            'items' => $categoryItems,
            'paginationData' => $this->paginationDataDTO->toArray(),
        ];
    }
}
