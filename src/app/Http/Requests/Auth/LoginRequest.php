<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\DTO\Auth\LoginDataDTO;
use App\Rules\Auth\ExistUserRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

final class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'min:5', 'max:255', new ExistUserRule('login')],
            'password' => ['required', 'string', 'min:8', 'max:64'],
        ];
    }

    public function toDto(): LoginDataDTO
    {
        $data = $this->validated();

        return new LoginDataDTO(
            $data['email'],
            $data['password']
        );
    }
}
