<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\DataKeeper\UserRoleKeeper;
use App\DTO\Auth\RegisterDataDTO;
use App\Rules\Auth\ExistUserRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

final class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:120', 'regex:/^[А-яA-z\s-]+$/u'],
            'role' => ['required', 'string', 'in:' . implode(',', UserRoleKeeper::list())],
            'email' => ['required', 'email', 'min:5', 'max:255', new ExistUserRule('register'), Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'confirmed', 'min:8', 'max:64'],
        ];
    }

    public function toDto(): RegisterDataDTO
    {
        $data = $this->validated();

        return new RegisterDataDTO(
            $data['name'],
            $data['role'],
            $data['email'],
            Hash::make($data['password']),
        );
    }
}
