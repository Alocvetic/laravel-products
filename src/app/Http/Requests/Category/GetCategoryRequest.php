<?php

declare(strict_types=1);

namespace App\Http\Requests\Category;

use App\DTO\Category\GetCategoryDTO;
use Illuminate\Foundation\Http\FormRequest;

final class GetCategoryRequest extends FormRequest
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
        ];
    }

    public function toDto(): GetCategoryDTO
    {
        $data = $this->validated();

        return new GetCategoryDTO(
            (int)$data['page']['limit'],
            (int)$data['page']['number'],
        );
    }
}
