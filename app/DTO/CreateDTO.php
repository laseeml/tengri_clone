<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;

final readonly class CreateDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public string $description_title,
        public UploadedFile $image,
        public int $categoryId
    ) {
    }
}
