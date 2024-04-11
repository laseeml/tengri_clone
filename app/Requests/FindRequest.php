<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FindRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'find_by' => ['required', 'string']
        ];
    }

    public function getFindBy(): string
    {
        return $this->validated('find_by');
    }
}
