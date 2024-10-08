<?php

namespace App\Rules\Product;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class AvailableProductSortRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $taskColsAsc = ['price'];
        $taskColsDesc = array_map(function ($key) {
            return "-$key";
        }, $taskColsAsc);

        $taskCols = array_merge($taskColsAsc, $taskColsDesc);

        $values = explode(',', $value);
        foreach ($values as $sortValue) {
            if (!in_array($sortValue, $taskCols)) {
                $fail('Недопустимое поле из таблицы products: ' . $sortValue);
            }
        }
    }
}
