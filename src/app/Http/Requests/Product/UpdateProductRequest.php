<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use App\DTO\Product\UpdateProductDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $this->merge([
            'id' => $this->route('id')
        ]);

        return [
            'id' => ['required', 'int', 'min:0', Rule::exists('products', 'id')],
            'name' => ['required', 'string', 'min:2',],
            'description' => ['nullable', 'string', 'min:2', 'max:800'],
            'category_id' => ['required', 'int', 'min:0', Rule::exists('categories', 'id')],
            'price' => ['required', 'int', 'min:1'],
        ];
    }

    public function toDto(): UpdateProductDTO
    {
        $data = $this->validated();

        return new UpdateProductDTO(
            (int)$data['id'],
            $data['name'],
            $data['description'] ?? null,
            (int)$data['price'],
            (int)$data['category_id'],
        );

    }
}
