<?php

declare(strict_types=1);

namespace App\Repository\Category;

use App\DTO\Category\{CreateCategoryDTO, UpdateCategoryDTO};
use App\Models\Category;

final class CategoryWriteRepository
{
    public function create(CreateCategoryDTO $createCategoryDTO): void
    {
        $category = new Category($createCategoryDTO->toArray());
        $category->save();
    }

    public function update(UpdateCategoryDTO $updateCategoryDTO): void
    {
        Category::where('id', $updateCategoryDTO->id)
            ->update($updateCategoryDTO->toArray());
    }

    public function delete(int $id): void
    {
        Category::where('id', $id)->delete();
    }
}
