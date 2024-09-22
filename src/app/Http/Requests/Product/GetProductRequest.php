<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use App\DTO\Product\GetProductDTO;
use Illuminate\Foundation\Http\FormRequest;

final class GetProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => ['required', 'array'],
            'page.limit' => ['required', 'integer', 'min:1'],
            'page.number' => ['required', 'integer', 'min:1'],
            'sort' => ['nullable', 'string'],
            'filter' => ['nullable', 'array'],
            'filter.category_id' => ['nullable', 'integer', 'min:0'],
            'filter.price_from' => ['nullable', 'integer', 'min:0'],
            'filter.price_to' => ['nullable', 'integer', 'min:0'],
            'filter.search' => ['nullable', 'string', 'min:1'],
        ];
    }

    public function toDto(): GetProductDTO
    {
        $data = $this->validated();

        return new GetProductDTO(
            (int)$data['page']['limit'],
            (int)$data['page']['number'],
            $data['sort'] ?? null,
            isset($data['filter']['category_id']) ? (int)$data['filter']['category_id'] : null,
            isset($data['filter']['price_from']) ? (int)$data['filter']['price_from'] : null,
            isset($data['filter']['price_to']) ? (int)$data['filter']['price_to'] : null,
            $data['filter']['search'] ?? null,
        );
    }
}
