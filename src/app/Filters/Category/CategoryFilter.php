<?php

declare(strict_types=1);

namespace App\Filters\Category;

use App\DTO\Category\GetCategoryDTO;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

final class CategoryFilter
{
    public function __construct(
        protected GetCategoryDTO $dto,
        protected Builder $query,
    ) {
        $this->query = Category::query();
    }

    public function buildQuery(GetCategoryDTO $getCategoryDTO): Builder
    {
        $this->dto = $getCategoryDTO;

        $this->page();

        return $this->query;
    }

    protected function page(): void
    {
        $this->query->limit($this->dto->limit);
        $this->query->offset($this->dto->offset);
    }
}
