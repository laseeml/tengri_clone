<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'filter_by' => ['nullable', 'integer'],
        ];
    }

    public function getFilter(): int | null
    {
        return $this->validated('filter_by');
    }
}
