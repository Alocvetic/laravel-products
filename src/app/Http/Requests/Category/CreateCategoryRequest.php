<?php

declare(strict_types=1);

namespace App\Http\Requests\Category;

use App\DTO\Category\CreateCategoryDTO;
use Illuminate\Foundation\Http\FormRequest;

final class CreateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2'],
        ];
    }

    public function toDto(): CreateCategoryDTO
    {
        $data = $this->validated();

        return new CreateCategoryDTO(
            $data['name'],
        );
    }
}
