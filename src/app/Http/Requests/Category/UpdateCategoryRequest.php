<?php

declare(strict_types=1);

namespace App\Http\Requests\Category;

use App\DTO\Category\UpdateCategoryDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateCategoryRequest extends FormRequest
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
            'id' => ['required', 'int', 'min:0', Rule::exists('categories', 'id')],
            'name' => ['required', 'string', 'min:2',],
        ];
    }

    public function toDto(): UpdateCategoryDTO
    {
        $data = $this->validated();

        return new UpdateCategoryDTO(
            (int)$data['id'],
            $data['name'],
        );

    }
}
