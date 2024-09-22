<?php

declare(strict_types=1);

namespace App\Filters\Product;

use App\DTO\Product\GetProductDTO;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

final class ProductFilter
{
    public function __construct(
        protected GetProductDTO $dto,
        protected Builder $query,
    ) {
        $this->query = Product::query();
    }

    public function buildQuery(GetProductDTO $getProductDTO): Builder
    {
        $this->dto = $getProductDTO;

        $this->page();
        $this->filter();
        $this->sort();

        return $this->query;
    }

    protected function sort(): void
    {
        $sort = $this->dto->sort;

        if ($sort === null) {
            return;
        }

        $sortParams = explode(',', $this->dto->sort);
        foreach ($sortParams as $sort) {
            if ($sort[0] === '-') {
                $this->query->orderBy(substr($sort, 1), 'desc');
            } else {
                $this->query->orderBy($sort);
            }
        }
    }

    protected function filter(): void
    {
        $this->filterByCategoryId();
        $this->filterByPrice();
    }

    protected function filterByCategoryId(): void
    {
        $category_id = $this->dto->filter_category_id;

        if ($category_id !== null) {
            $this->query->where('category_id', '=', $category_id);
        }
    }

    protected function filterByPrice(): void
    {
        $price_from = $this->dto->filter_price_from;
        $price_to = $this->dto->filter_price_to;

        if ($price_from !== null) {
            $this->query->where('price', '>=', $price_from);
        }
        if ($price_from !== null) {
            $this->query->where('price', '<=', $price_to);
        }
    }

    protected function page(): void
    {
        $this->query->limit($this->dto->limit);
        $this->query->offset($this->dto->offset);
    }
}
