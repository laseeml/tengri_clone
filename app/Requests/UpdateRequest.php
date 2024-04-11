<?php

namespace App\Requests;

use App\DTO\UpdateDTO;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'description_title' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'category_id' => ['nullable', 'integer'],
        ];
    }

    public function getDto(): UpdateDTO
    {
        return new UpdateDTO(
            $this->validated('title'),
            $this->validated('description'),
            $this->validated('description_title'),
            $this->file('image'),
            (int) $this->validated('category_id'),
        );
    }
}
