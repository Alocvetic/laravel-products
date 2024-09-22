<?php

declare(strict_types=1);

namespace App\Services\Product;

use App\DTO\Product\{CreateProductDTO, UpdateProductDTO};
use App\Repository\Product\ProductWriteRepository;

final class ProductWriteService
{
    public function __construct(
        protected readonly ProductWriteRepository $writeRepository,
    ) {
    }

    public function create(CreateProductDTO $createProductDTO): array
    {
        $this->writeRepository->create($createProductDTO);

        return [
            'data' => null,
            'message' => 'Продукт успешно создан!'
        ];
    }

    public function update(UpdateProductDTO $updateProductDTO): array
    {
        $this->writeRepository->update($updateProductDTO);

        return [
            'data' => null,
            'message' => 'Данные продукта успешно обновлены!'
        ];
    }

    public function delete(int $id): array
    {
        $this->writeRepository->delete($id);

        return [
            'data' => null,
            'message' => 'Продукт успешно удален!'
        ];
    }
}
