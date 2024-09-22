<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\DTO\Category\{CategoryCollection, CategoryDTO, GetCategoryDTO};
use App\Factories\Category\CategoryFactory;
use App\Filters\Category\CategoryFilter;
use App\Repository\Category\CategoryReadRepository;

final class CategoryReadService
{
    public function __construct(
        protected readonly CategoryReadRepository $readRepository,
        protected readonly CategoryFactory $factory,
        protected readonly CategoryFilter $filter,
    ) {
    }

    public function get(GetCategoryDTO $getCategoryDTO): CategoryCollection
    {
        $query = $this->filter->buildQuery($getCategoryDTO);
        $categories = $this->readRepository->get($query);

        return $this->factory->buildCollection($categories);
    }

    public function getById(int $id): CategoryDTO
    {
        $category = $this->readRepository->getById($id);

        return $this->factory->buildDto($category);
    }

    public function checkById(int $id): bool
    {
        return $this->readRepository->checkById($id);
    }
}
