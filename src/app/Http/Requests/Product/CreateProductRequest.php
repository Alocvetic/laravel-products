<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use App\DTO\Product\CreateProductDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2',],
            'description' => ['nullable', 'string', 'min:2', 'max:800'],
            'category_id' => ['required', 'int', 'min:0', 'max:255', Rule::exists('categories', 'id')],
            'price' => ['required', 'int', 'min:1'],
        ];
    }

    public function toDto(): CreateProductDTO
    {
        $data = $this->validated();

        return new CreateProductDTO(
            $data['name'],
            $data['description'] ?? null,
            (int)$data['price'],
            (int)$data['category_id'],
        );
    }
}
