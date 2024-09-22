<?php

declare(strict_types=1);

namespace App\Services\Product;

use App\Factories\Product\ProductFactory;
use App\Filters\Product\ProductFilter;
use App\DTO\Product\{GetProductDTO, ProductCollection, ProductDTO};
use App\Repository\Product\ProductReadRepository;

final class ProductReadService
{
    public function __construct(
        protected readonly ProductReadRepository $readRepository,
        protected readonly ProductFactory $factory,
        protected readonly ProductFilter $filter,
    ) {
    }

    public function get(GetProductDTO $getProductDTO): ProductCollection
    {
        $query = $this->filter->buildQuery($getProductDTO);
        $products = $this->readRepository->get($query);

        return $this->factory->buildCollection($products);
    }

    public function getById(int $id): ProductDTO
    {
        $product = $this->readRepository->getById($id);

        return $this->factory->buildDto($product);
    }

    public function checkById(int $id): bool
    {
        return $this->readRepository->checkById($id);
    }
}
