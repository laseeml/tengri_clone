<?php

namespace App\Requests;

use App\DTO\CreateDTO;
use Illuminate\Foundation\Http\FormRequest;

final class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description_title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'category_id' => ['required', 'integer'],
        ];
    }

    public function getDto(): CreateDTO
    {
        return new CreateDTO(
            $this->validated('title'),
            $this->validated('description'),
            $this->validated('description_title'),
            $this->file('image'),
            (int) $this->validated('category_id')
        );
    }
}
