<?php

namespace App\Requests;

use App\DTO\LoginDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

final class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function getDto(): LoginDTO
    {
        return new LoginDTO(
            $this->validated('email'),
            $this->validated('password'),
        );
    }
}
