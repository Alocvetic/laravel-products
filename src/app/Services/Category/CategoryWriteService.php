<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\DTO\Category\{CreateCategoryDTO, UpdateCategoryDTO};
use App\Repository\Category\CategoryWriteRepository;

final class CategoryWriteService
{
    public function __construct(
        protected readonly CategoryWriteRepository $writeRepository,
    ) {
    }

    public function create(CreateCategoryDTO $createCategoryDTO): array
    {
        $this->writeRepository->create($createCategoryDTO);

        return [
            'data' => null,
            'message' => 'Категория успешно создана!'
        ];
    }

    public function update(UpdateCategoryDTO $updateCategoryDTO): array
    {
        $this->writeRepository->update($updateCategoryDTO);

        return [
            'data' => null,
            'message' => 'Данные категории успешно обновлены!'
        ];
    }

    public function delete(int $id): array
    {
        $this->writeRepository->delete($id);

        return [
            'data' => null,
            'message' => 'Категория успешно удалена!'
        ];
    }
}
